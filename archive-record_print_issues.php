<?php
get_header();
?>
<div id="content">
<div class="column-1">
    <div class="recent">
        <h1>Volume 109 Print Issues</h1>
    </div>
    <?php while (have_posts()) : the_post(); ?>
        <div class="recent">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <h3 class="timestamp"><?php the_time(F);?>&nbsp;<?php the_time(j);?></h3>
        </div>
    <?php endwhile; ?>
    <div class="more">&gt; &gt; more</div>  
		<div class="navigation">
			<?php search_pagination();?>
		</div>                                     
</div>
<?php
get_sidebar();
get_footer();
?>