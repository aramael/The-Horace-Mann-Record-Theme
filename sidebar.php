	            </div><!--END #content-->
                <div id="sidebar">
                	<a href="http://horacemann.org"><center><img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebarLogo2.png" /></center></a>
                	<!--<div id="sidebar-box">
                    	<h1>Weekly Newsletter</h1>
						<div id="mc_embed_signup">
                        	<p>Simply enter your email address below to receive The Horace Mann Record's weekly email newsletter. We'll send you the hottest articles each week, so they will be waiting in your inbox when you look. All you have to do is enter your email address and we'll take care of the rest. We pinky swear that we won't spam you.</p>
							<form action="http://horacemann.us2.list-manage.com/subscribe/post?u=d9785b9192718191e80a93101&amp;id=8fd6d00462" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
							<div class="mc-field-group">
								<label for="mce-EMAIL">Email Address</label>
								<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="    someone@example.com">
							</div>
							<div id="mce-responses">
								<div class="response" id="mce-error-response" style="display:none"></div>
								<div class="response" id="mce-success-response" style="display:none"></div>
							</div>
                           		<input type="submit" value="Subscribe" name="subscribe"/>
							</form>
						</div>
                    </div>-->
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar") ) : ?>
					<?php endif; ?>
                    <!--<div id="followUs">
                    	<ul>
                        	<li><a href="http://eepurl.com/fmJ0E" class="emailFollow">Email</a></li>
                        	<li><a href="http://www.facebook.com/HMRecord" class="facebookFollow">Facebook</a></li>
                            <li><a href="http://www.twitter.com/#!/HMRecord" class="twitterFollow">Twitter</a></li>
                            <li><a href="#" class="rssFollow">RSS</a></li>
                        </ul>
                    </div>-->