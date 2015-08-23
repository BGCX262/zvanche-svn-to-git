<?php

class WP_Recent_Posts_Thumbnails extends WP_Widget {

    function __construct() {
        parent::__construct(
            'recent_posts_thumbnails', __('Последни новини със снимки'), array('description' => __('Показва последните няколко новини със техните снимки в страничната лента'))
        );
    }

    function widget($args, $instance) {
        extract($args);
        $number_of_posts  = $instance["number"];
        $title_of_section = apply_filters( 'widget_title', $instance['title'] );                
        
        
        $queryTheLatestPosts = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number_of_posts, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        
        if ( $queryTheLatestPosts->have_posts() ) {
            echo $before_widget;
            if ( ! empty( $title_of_section ) ) echo $before_title . $title_of_section . $after_title;
            echo '<ul id="news">';
            while ($queryTheLatestPosts->have_posts()) {
                $queryTheLatestPosts->the_post();
                ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(54, 54));?></a>
                        <h3><?php the_title(); ?></h3>                        
                        <p><?php $this->the_excerpt_max_charlength(60); ?><br />
                        <a href="<?php the_permalink(); ?>">More &raquo;</a></p>
                    </li>
                <?php
            }
            echo '</ul>';            
        }
        
        echo $after_widget;
    }
    
    function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
    }
    
    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['number'] = intval(strip_tags( $new_instance['number'] ));
        return $instance;
    }

    function form($instance) {
        $title = (isset( $instance[ 'title' ])) ? $instance['title' ] : __('Последни новини');
        $number = (isset( $instance[ 'number' ])) ? $instance['number' ] : 5;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'number' );?>"><?php _e('Брой последни новини:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <?php
    }

}
?>
