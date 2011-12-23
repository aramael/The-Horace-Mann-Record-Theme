</div><!--END #content-->
<div id="sidebar">
<a href="http://horacemann.org"><center><img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebarLogo2.png" /></center></a>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar") ) : ?>
<?php endif; ?>
<div class="spacing"></div>