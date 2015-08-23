<?php get_header() ?>

<div id="content">        

    <?php                 
        if (!is_search()) :
            query_posts('showposts='. get_option('posts_per_page', 1) .'&paged=' . $paged);
        endif;
    ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="post">
                <h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> - <?php the_time('d.m.Y'); ?> г.</a></h2>                
                <?php global $more;
                $more = 0;
                ?>
            <?php the_content('Прочети още...'); ?>        
            </div>
            <div style="clear: both"></div>
        <?php endwhile;
    else:
        ?>
        <p><?php _e('Няма отркити новини!'); ?></p>
    <?php endif; ?>

<?php if ( $wp_query->max_num_pages > 1 ) : previous_posts_link('Предишни'); ?> / <?php next_posts_link('Следващи'); endif;?>
<?php wp_reset_query(); ?>

</div> <!-- END OF CONTENT -->        

<?php get_sidebar(); ?>

<?php get_footer(); ?>