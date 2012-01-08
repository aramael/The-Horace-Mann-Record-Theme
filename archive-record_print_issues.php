<?php
get_header();
?>
<div id="content">
<div class="column-1">
    <div class="recent">
        <h1>Most Recent <?php echo $category->name;?> Articles</h1>
    </div>
    <?php while (have_posts()) : the_post(); ?>
        <div class="issue column-4">
            <div class="issueBorder" title="<?php the_title(); ?>"><a href="<?php the_permalink();?>"><img src="../../../../Downloads/recordIssues/Issue02_Page_1.jpg" width="127"/></a></div>
            <p><?php the_title(); ?></p>
        </div>

    <?php endwhile; ?>
    <div class="more">&gt; &gt; more</div>                                       
</div>

<?php
get_sidebar();
get_footer();
?>