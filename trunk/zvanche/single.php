<?php get_header() ?>

<div id="content">     
    
    <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
        <div class="post">
            <h2><?php the_title(); ?> - <?php the_time('d.m.Y');?> г.</h2>                            
            <?php the_content(); ?>        
        </div>
        <div style="clear: both"></div>
    <?php endwhile; else: ?>
            <p><?php _e('Няма отркити новини!'); ?></p>
    <?php endif; ?>
            
    <?php previous_post_link(); ?> / <?php next_post_link();?>
    
</div> <!-- END OF CONTENT -->        

<?php get_sidebar(); ?>

<?php get_footer(); ?>