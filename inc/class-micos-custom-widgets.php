<?php

// Creating the widget 
class category_contents_widget extends WP_Widget {
 
    // The construct part  
    function __construct() {
     parent::__construct('category_contents_widget', __("Mico's Menu",'category_contents_widget_domain'), array('description'=>__("Widget for Mico's Menu",'category_contents_widget_domain'),));
    }
      
    // Creating widget front-end
    public function widget( $args, $instance ) {
     $title = apply_filters('widget_title',$instance['title']);

     echo $args['before_widget'];
     if(!empty($title))
     echo $args['before_title'] . $title . $args['after_title'];

     $categoryId = isset($instance['category']) ? $instance['category'] : __(0, 'category_contents_widget_domain');
     $category = get_term($categoryId,'product_cat');

     ?>
        <p class="widget-product-subtitle"> <?php echo $category->name;?></p>
     <?php

     $products = array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $categoryId
            )
        )
     );
     $product_list = get_posts($products);
     print_r($wp_customize);
     ?>
        <div class="widget widget_nav_menu">
        <ul class="widget-product-list">
     <?php
     foreach($product_list as $product){
        ?>
            <li><a href="<?php echo esc_url($product->guid)?>"><?php echo esc_attr($product->post_title)?></a></li>
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
     $title = isset($instance['title']) ? $instance['title'] : __("Mico's Menu", 'category_contents_widget_domain');

     ?>
        <p>
            <label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title:','category_contents_widget_domain');?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('title'));?>" type="text" value="<?php echo esc_attr($title);?>">
        </p> 
    <?php

     // Widget admin form
    $taxonomy   = 'product_cat';
    $orderby    = 'name';
    $name       = $this->get_field_name('category');
    $id         = $this->get_field_id('category');
    $selected   =  isset($instance['category']) ? $instance['category'] : __(0,'category_contents_widget_domain');

    $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'class'        => 'widefat',
            'selected'     => $selected,
            'name'         => $name,
            'id'           => $id,
    );
    
    ?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_name('category'));?>">Category to display</label>
        <?php wp_dropdown_categories($args); ?>
    </p>
     <?php
    }
          
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['category'] = (isset($new_instance['category'])) ? sanitize_text_field( $new_instance['category']) : '';

        return $instance;
    }
}


function category_contents_load_widget() {
    register_widget( 'category_contents_widget' );
}

add_action( 'widgets_init', 'category_contents_load_widget' );