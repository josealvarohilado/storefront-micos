<?php

// Creating the widget 
class micos_category_widget extends WP_Widget {
 
    // The construct part  
    function __construct() {
     parent::__construct('micos_category_widget', __("Product Menu",'micos_category_widget_domain'), array('description'=>__("Displays Product Categories as Menu for Mico's theme",'micos_category_widget_domain'),));
    }
      
    // Creating widget front-end
    public function widget( $args, $instance ) {
     $title = apply_filters('widget_title',$instance['title']);

     echo $args['before_widget'];
     if(!empty($title))
     echo $args['before_title'] . $title . $args['after_title'];

     $excluded_cat = isset($instance['exclude_cat']) ? $instance['exclude_cat'] : __(0, 'micos_category_widget_domain');
     $sub_title_set = isset($instance['sub_title']) ? $instance['sub_title'] : __("Sub Title", 'micos_category_widget_domain');

     ?>
        <p class="widget-product-subtitle"> <?php echo esc_attr($sub_title_set);?></p>
     <?php

     $products = array(
        'taxonomy' => 'product_cat',
        'orderby'  => 'name',
        'order'    => 'ASC',
        'exclude'  => $excluded_cat
     );
    $product_list = get_categories($products);
     ?>
        <div class="widget widget_nav_menu">
        <ul class="widget-product-list">
     <?php
     foreach($product_list as $product){
        ?>
            <li><a href="<?php echo esc_url(get_category_link($product->cat_ID))?>"><?php echo esc_attr($product->name)?></a></li>
        <?php
     };
     ?>
        </ul>
        </div>
     <?php

     echo $args['after_widget'];
    }
              
    // Creating widget Backend 
    public function form($instance ) {
     $title = isset($instance['title']) ? $instance['title'] : __("Product Menu", 'micos_category_widget_domain');
     $sub_title = isset($instance['sub_title']) ? $instance['sub_title'] : __("Sub Title", 'micos_category_widget_domain');
     $exclude_cat = isset($instance['exclude_cat']) ? $instance['exclude_cat'] : __("", 'micos_category_widget_domain');

     ?>
        <p>
            <label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title:','micos_category_widget_domain');?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('title'));?>" type="text" value="<?php echo esc_attr($title);?>">

            <label for="<?php echo $this->get_field_id('sub_title');?>"><?php _e('Sub Title:','micos_category_widget_domain');?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('sub_title'));?>" type="text" value="<?php echo esc_attr($sub_title);?>">

            <label for="<?php echo $this->get_field_id('exclude_cat');?>"><?php _e('Exclude Category IDs: (separate with commas)','micos_category_widget_domain');?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'exclude_cat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('exclude_cat'));?>" type="text" value="<?php echo esc_attr($exclude_cat);?>">
        </p> 
    <?php
    }
          
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['sub_title'] = ( ! empty( $new_instance['sub_title'] ) ) ? sanitize_text_field( $new_instance['sub_title'] ) : '';
        $instance['exclude_cat'] = ( ! empty( $new_instance['exclude_cat'] ) ) ? sanitize_text_field( $new_instance['exclude_cat'] ) : '';

        return $instance;
    }
}


function micos_category_load_widget() {
    register_widget( 'micos_category_widget' );
}

add_action( 'widgets_init', 'micos_category_load_widget' );