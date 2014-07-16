<?php

register_nav_menu( 'primary', __( 'Primary Menu', 'bootstrap-theme-example' ) );


function wpt_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'basic-theme-example' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'basic-theme-example' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'wpt_widgets_init' );

function wpt_bootstrap_scripts()
{
    wp_enqueue_script("jquery");
    // Register the script like this for a theme:
    wp_register_script('bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array('jquery'));
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'wpt_bootstrap_scripts');

add_action('init', 'wpt_create_post_type');

function wpt_create_post_type()
{
    register_post_type('wpt_product', array(
        'labels' => array(
            'name' => __('Products'),
            'singular_name' => __('Product')
        ),
        'public' => true,
        'has_archive' => true,
        'taxonomies' => array('category', 'post_tag'),
        'supports' => array('title', 'editor', 'custom-fields'),
            )
    );
}


add_action('widgets_init', 'wpt_register_widget'); 


function wpt_register_widget()
{
    register_widget('WPT_Widget');
}


// function to register my widget
class WPT_Widget extends WP_Widget
{
    function WPT_Widget()
	{
		  parent::__construct(
		  // Base ID of your widget
		  'wpt_widget',
		  // Widget name will appear in UI
		  __('WP Training Widget', 'wpt_widget_domain'),
		  // Widget description
		  array('description' => __('Sample widget', 'wpt_widget_domain'),)
		  );
	}
    // Creating widget front-end
	public function widget($args, $instance)
	{
		$title = apply_filters('widget_title', $instance['title']);
		$content = apply_filters('widget_content', $instance['content']);
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if (!empty($title))
			echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		echo $content;
		echo $args['after_widget'];
	}

    // Widget admin form 
	public function form($instance)
	{
		$title = isset($instance['title']) ? $instance['title']: __('New title', 'wpt_widget_domain');
		$content = isset($instance['content']) ? $instance['content']: __('Hello, world!', 'wpt_widget_domain');
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>" type="text" value="<?php echo esc_attr($content); ?>" />
		</p>
		<?php
	}

    // Saving widget settings
	public function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
		$instance['content'] = (!empty($new_instance['content']) ) ? strip_tags($new_instance['content']) : '';
		return $instance;
	}

}





