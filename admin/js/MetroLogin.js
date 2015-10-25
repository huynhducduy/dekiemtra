// Configurations. For more information check the Documentation folder
var bgColor        = "#087fcf";
var LockWallpaper  = "back1.jpg";
var WeekDays       = new Array("Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy");
var Months         = new Array("tháng 1", "tháng 2", "tháng 3", "tháng 4", "tháng 5", "tháng 6", "tháng 7", "tháng 8", "tháng 9", "tháng 10", "tháng 11", "tháng 12");
var MonthSeparator = "ngày";
var UserEnterMessage = "Mời đăng nhập";
var RememberMeLabel  = "Nhớ tôi";
var LoadingMessage   = "Đang đăng nhập"
var ErrorMessage     = "Tên đăng nhập và mật khẩu không đúng";
var ErrorBotonLabel  = "Thử lại";
var ColorBar    = new Array ("#087fcf", "#c50577", "#006731", "#22236c", "#000000", "#c2161d", "#f7941d", "#630460");
var Backgrounds = new Array ("back1.jpg","back2.jpg","back3.jpg","back4.jpg","back5.jpg","back6.jpg");
var TimeOut = 10;
// Function to control the login.  1= Correct  0= Incorrect
// The validation is in the "loginCheck.php" file
function isCorrect(IsCorrect)
{
	if(IsCorrect == 1)
	{
		window.location.replace("index2.php");
	}
	else
	{
		UnLoading();
	}
}
// Function to change the color
// Just send the HTML color code to the function. 
// Example: ChangeColor('#4b0049');
function ChangeColor(HTMLcolor)
{
	$("body").css("background",HTMLcolor);
	$("#botLogIn").css("background-color", HTMLcolor);
	$(".color").css("background", HTMLcolor);	
	$("#botTryAgain").css("background-color", HTMLcolor);
	$("#txtCurrentColor").val(HTMLcolor);

}
// Function to change the wallpaper
// Just send the name and extension of the image
// Example: ChangeWallpaper('back1.jpg')
function ChangeWallpaper(URLimage)
{
	$("#BackgroundUp").css("background-image","url(backgrounds/"+ URLimage +")");
	$("#txtCurrentBack").val(URLimage);
}
// =======================================================================
// Working code.. do not touch... unless you understand what you are doing
// =======================================================================
$(".loginMessage").text(UserEnterMessage);
content = '<div id="BackgroundUp"></div>';
$("body").append(content);
// $(".LoginBox").show();
content  = '<input type="hidden" id="HiddenPass" name="HiddenPass"/>';
content += '<div class="squaredTwo"><input type="checkbox" value="None" id="squaredTwo" name="chkRemember" checked/><label for="squaredTwo" class="color"></label></div><input type="hidden" id="txtRememberMe" name="txtRememberMe" value="0"/><span class="lblRemember">'+ RememberMeLabel +'</span>';
content += '<input type="hidden" id="txtCurrentColor" name="txtCurrentColor"/>';
content += '<input type="hidden" id="txtCurrentBack" name="txtCurrentBack"/>';
$("#frmLogin").append(content);
content = '<div class="boxLoading"><img src="img/loading82.gif"><span>'+LoadingMessage+'</span></div>';
content += '<div class="loginFail"><span class="OrangeSpan">'+ ErrorMessage +'</span><p></p><button id="botTryAgain">'+ ErrorBotonLabel +'</button></div>';
$(".LoginBox").append(content);
$("body").css("background",bgColor);
$("#botLogIn").css("background-color", bgColor);
$(".color").css("background", bgColor);
$("#botTryAgain").css("background-color", bgColor);
$("#BackgroundUp").css("background-image","url(backgrounds/"+ LockWallpaper +")");
$("#txtCurrentColor").val(bgColor);
$("#txtCurrentBack").val(LockWallpaper);
// Lock background configuration
// content = '<img src="img/picture.png" id="OptionBack">';
content = '<div id="DivBacks">';
for(i=0; i<Backgrounds.length ;i++)
{
	content += '<div class="boxBack"><img src="backgrounds/mini'+ Backgrounds[i] +'"/>'+ Backgrounds[i] +'</div>';
}
content += '</div>';

$("body").append(content);

// .Lock Background configuration


// Create the ColorBar tool
content = '<div id="DivColors">';
for(i=0; i<ColorBar.length ;i++)
{
	content += '<div class="boxColor">'+ ColorBar[i] +'</div>';
}
content += '</div>';

$("body").append(content);
// .Create the ColorBar tool

var Seeing  = 0;
var Save    = "";
var Open    = 0;
var OnError = 0;
var Checked = 0;

var BarOpen = 0;
var BacOpen = 0;

var TimeOutTempo = TimeOut;

// creating the div for time
var content = '<div class="MetroBox"><span id="MetroTime">hh:mm</span><br/><span id="MetroDate"><br/>day, dd of mm</span></div>';
$("#BackgroundUp").append(content);

// Time
NowTime();

// Timer tick
setInterval(function()
	{
		NowTime();
	},1000);


function NowTime()
{

	var now = new Date();
	// alert(WeekDays[now.getDay()]);

	$("#MetroDate").text(WeekDays[now.getDay()] + ", " + MonthSeparator + " " + now.getDate() + " " + Months[now.getMonth()]);
	var min = now.getMinutes();
	if(min < 10)
	{
		min = "0" + now.getMinutes();
	}
	else
	{
		min =  now.getMinutes();
	}
	$("#MetroTime").text(now.getHours()+ ":" + min);

	// Closing if reach timeout

	if(Open==1)
	{
		// alert(TimeOutTempo);
		if(TimeOutTempo ==0)
		{
			$("body").focus();
			$("#BackgroundUp").removeClass("fadeOutUpBig");
			$("#BackgroundUp").addClass("fadeInDownBig").delay(100).queue(function()
            {  
                $("#BackgroundUp").clearQueue();
				Open = 0;
            });
            TimeOutTempo = TimeOut;
		}
		else
		{
			TimeOutTempo = TimeOutTempo -1;
		}
	}
	else
	{
		TimeOutTempo = TimeOut;
	}



}


// javascript special functions
$("#BackgroundUp").click(function(){

	$(".LoginBox").show();

	$(this).removeClass("fadeInDownBig");
	$(this).addClass("animated fadeOutUpBig");
	$("#txtUser").focus();
	Open=1;

	if(BacOpen==1)
	{
		$("#DivBacks").removeClass("animated fadeIn quick");
		$("#DivBacks").addClass("animated fadeOut quick").delay(300).queue(function(){
			$(this).clearQueue();
			$(this).hide();
		});
		
		BacOpen=0;
	}
});

$("#txtUser").keyup(function(){

	var User = $(this).val();

	if(User.length <1)
		User = UserEnterMessage;

	$("h2").text(User);

});


// Simple input validation
// If you need more parameter values, you can modify this function
$("#botLogIn").click(function(){

	var User = $.trim($("#txtUser").val());
	var Pass = $("#txtPassword").val();


	if(User.length <1)
	{
		$("#txtUser").focus();
		return false;
	}
		
	if(Pass.length <1)
	{
		$("#txtPassword").focus();
		return false;
	}


	if(OnError==1)
	{
		$("#botTryAgain").click();
	}
	else
	{
		Loading();	
	}

});


function Loading()
{
	$(".fields").hide();
	$(".boxLoading").addClass("animated fadeIn quick");
	
	$(".boxLoading").show();
}

function UnLoading()
{
	$(".boxLoading").hide();
	$(".loginFail").show();
	
}


$(".seePass").mousedown(function(){

	Save = $("#txtPassword").val();

	$("#txtPassword").replaceWith('<input id="txtVisible" type="text" value="'+ Save +'" placeholder="Password"/>');

});

$(".seePass").mouseup(function(){

	Save = $("#txtVisible").val();
	
	$("#txtVisible").replaceWith('<input id="txtPassword" type="password" value="'+ Save +'"  placeholder="Password"/>');

});

$(".seePass").mouseout(function(){

	$(this).mouseup();

});


$("#txtUser").keypress(function(e){

	TimeOutTempo = TimeOut;
	var code = (e.keyCode ? e.keyCode : e.which);
	 if(code == 13) { 
	   	$("#botLogIn").click();
	 }

});

$("#txtPassword").keypress(function(e){

	TimeOutTempo = TimeOut;
	var code = (e.keyCode ? e.keyCode : e.which);
	 if(code == 13) { 
	   	$("#botLogIn").click();
	 }

});


// Open and close with ESC and ENTER Button
$("body").keyup(function(e){

	if (e.keyCode == 27) { 
		$("#txtUser").val("");
		$("#txtPassword").val("");


		if(Open==1)
		{
			$("body").focus();
			$("#BackgroundUp").removeClass("fadeOutUpBig");
			$("#BackgroundUp").addClass("fadeInDownBig").delay(100).queue(function()
            {  
                $("#BackgroundUp").clearQueue();
				Open = 0;
            });

		}
		else
		{
			$("#BackgroundUp").click();
		}

	}
	else
	{
		if (e.keyCode == 13 && Open == 0) 
		{
			$("#BackgroundUp").click();
		}
	}
	
});


// Accept button if the user type a word
$("#botTryAgain").click(function(){

	TimeOutTempo = TimeOut;

	$(".loginFail").delay(300).queue(function(){

		OnError=0;

		$("#txtPassword").val("");
		$("#txtPassword").focus();

		$(".loginFail").clearQueue();
		$(".loginFail").hide();

		$(".fields").addClass("animated fadeIn quick");
		$(".fields").show();

	});

});



$(document).ready(function() {
  
  	// $(".LoginBox").show();



  	$("#frmLogin").submit(function()     //Name of the summited form.
        {
        	Save = $("#txtPassword").val();
			$("#HiddenPass").val(Save);
 	
        	if(OnError==1)
        	{
        		$("#botTryAgain").click();
        		return false;
        	}


          $.ajax({
            type:     "POST",             //Keep this value as POST. (is the form type) 
            url:      "logincheck.php",         //URL is the page that use the summited information
            dataType: "html",             //Keep the dataType to HTML.
            data:$(this).serialize(),     //Serialize the procedure. 
            beforeSend:function(){         //This function is triggered before send the information
                    

            },
            success:function(response){   //This function is triggered after the "sendcomment.php" is processed.

            // alert(response);

               if(response !=1)
               {
               	  OnError = 1;
               	  $(".loginFail").addClass("animated fadeIn quick");
               	  $(".loginFail").show();
               }

               isCorrect(response);		  // see "loginCheck.php" to get a better idea about response
            }

          })
          return false;                   //This line avoid the form refresh.
        })

});

// Style correction for firefox
	var ua = $.browser;
  	if ( ua.mozilla ) 
  	{
    	$("#botLogIn").css("top", "-32");
    	$(".seePass").css("top", "-24");
  	}

 $("#squaredTwo").click(function(){

 	if(Checked==0)
 	{
 		$("#txtRememberMe").val("1");
 		Checked=1;
 	}
 	else
 	{
 		$("#txtRememberMe").val("0");
 		Checked=0;
 	}
 	

 });


// Function that create the color bar engine
$("#OptionColor").click(function(){

	TimeOutTempo = TimeOut;
	if (BarOpen==0)
	{
		$("#DivColors").addClass("animated fadeIn quick");
		$("#DivColors").show();
		BarOpen=1;
	}
	else
	{
		$("#DivColors").removeClass("fadeIn quick");
		$("#DivColors").addClass("fadeOut quick").delay(300).queue(function(){
			$(this).hide();
		});
		BarOpen=0;
	}
});

$("#OptionBack").click(function(){
	
	$(".LoginBox").hide();

	if(Open == 1)
	{
		Open = 0;
		$("#BackgroundUp").addClass("fadeInDownBig").delay(100).queue(function()
        {  
            $("#BackgroundUp").clearQueue();
        });
	}



	if(BacOpen == 0)
	{
		$("#DivBacks").addClass("animated fadeIn quick");
		$("#DivBacks").show();
		BacOpen=1;
	}
	else
	{	
		$("#DivBacks").removeClass("fadeIn quick")
		$("#DivBacks").addClass("fadeOut quick").delay(300).queue(function(){
			$(this).clearQueue();
			$(this).hide();
		});
		
		BacOpen=0;
	}
	

});


 $('.boxColor').each(function(index) 
 {
 	var Color = $(this).text();
    $(this).css("background-color", Color);
});


$(".boxBack").click(function(){
	$("#LoginBox").hide();
	var BackImg = $(this).text();
	$("#BackgroundUp").css("background-image","url(backgrounds/"+ BackImg +")");
	$("#txtCurrentBack").val(BackImg);
});


$(".boxColor").click(function(){

	var Color = $(this).text();
	TimeOutTempo = TimeOut;
	
	$("body").css("background",Color);
	$("#botLogIn").css("background-color", Color);
	$(".color").css("background", Color);	
	$("#botTryAgain").css("background-color", Color);

	$("#txtCurrentColor").val(Color);
});