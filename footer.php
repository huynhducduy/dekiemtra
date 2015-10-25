<div class="clear"></div>
</div>
</div>
<div class="clear"></div>
</div>
				<div id="footer">
					<div id="footerright">
						<div class="footer1">
							<ul class="menufooter">
							<center>
								<li><b><a href="http://www.alexa.com/siteinfo/<?php echo settings("url");?>"><script type='text/javascript' src='http://xslt.alexa.com/site_stats/js/t/a?url=<?php echo settings("url");?>'></script></a></li>
								<br/><br/><br/><br/><div class="g-plusone" data-size="medium"></div><div class="fb-like" data-href="<?php echo settings("url");?>" data-send="false" data-layout="button_count" data-width="100%" data-show-faces="false"></div>
								</ul>
							</center>
						</div>
						<div class="footer1">
							<ul class="menufooter">
								<li>
								<?php
								$y = explode('|',"|".settings("ads_3"));
								echo "
								<a href='".$y[2]."' rel='nofollow'>
								<img src='./images/".$y[1]."' width='200' height='90' style='margin-left: -3px;' alt='".$y[3]."' title='".$y[3]."'/></a>";
								?>
								</li>
							</ul>
						</div>
						<div class="footer1">
							<ul class="menufooter">
								<li><?php
								$y = explode('|',"|".settings("ads_4"));
								echo "
								<a href='".$y[2]."' rel='nofollow'>
								<img src='./images/".$y[1]."' width='200' height='90' style='margin-left: -3px;' alt='".$y[3]."' title='".$y[3]."'/></a>";
								?></li>
							</ul>
						</div>
						<div class="footer1">
							<ul class="menufooter">
								<li><?php
								$y = explode('|',"|".settings("ads_5"));
								echo "
								<a href='".$y[2]."' rel='nofollow'>
								<img src='./images/".$y[1]."' width='200' height='90' style='margin-left: -3px;' alt='".$y[3]."' title='".$y[3]."'/></a>";
								?></li>
							</ul>
						</div>
						<div class="clear"></div>
						<div id="footerbottom">
							<h5>Copyright &copy; 2013 by <a href="<?php echo settings("url");?>"><?php echo settings("author");?></a></h5>
							<a href="#" class="linktop">Đầu trang</a>
						</div>
					</div>
				</div>
				<?php echo settings("add_code");?>
			</div>
		</div>
	</div>
</div>
</body>
</html>