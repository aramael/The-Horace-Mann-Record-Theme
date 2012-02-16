</div><!--END #content-->
<div id="sidebar">
    <div class="logo"></div>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar") ) : ?>
    <?php endif; ?>
    <div class="spacing"></div>