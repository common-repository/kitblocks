<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;



class kitblocks_blog_area {
    function __construct(){
        add_action( 'carbon_fields_register_fields', [$this, 'kitblocks_blog_area_fun'] );      
        add_action( 'wp_footer', array( $this, 'kitblocks_blog_area_js' ) );    
    }
    public function kitblocks_blog_area_js(){
    }
    function kitblocks_blog_area_fun(){
        wp_enqueue_style( 'k-s-b-o-blog-style', plugins_url("/simple-blog-area.css", __FILE__ ));

        Block::make( __( 'kitblocks simple blog' ) )

        
        ->set_category( 'kitblocks' )
        ->set_icon( 'smiley' )
        ->set_keywords( [ __( 'icon' ), __( 'icons' ), __( 'icon block' ) ] )
        ->set_editor_style( 'k-s-b-o-blog-style' )
        ->set_preview_mode( true )
        ->set_render_callback( function ( $fields ) {

    ?>
    <?php
    ?>
        <div class="k-s-b-o content-center design-two">
            <div class="kitblocks-container">
                <div class="kitblocks-row">
                    <div class="kitblocks-col-md-12">
                        <div class="kitb-uglbog-header">
                            <h2>Latest</h2>
                        </div>
                    </div>
                        <?php
                        $args = array(
                            'posts_per_page' => 4,
                        );
                        global $wpdb;
                        $loop = new WP_Query($args);
                        $i = 1;
                        if ($loop->have_posts()) {
                            while ($loop->have_posts()) : $loop->the_post();
                    ?>
                        <div class="kitblocks-col-md-3 kitblocks-col-sm-6 kitblocks-col-12">
                            <div class="k-s-b-o-item">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <div class="k-s-b-o-item-img">
                                    <?php the_post_thumbnail( 'kitblocks-blog-grid' ); ?>
                                    </div>   
                                    <div class="k-s-b-o-item-header">
                                        <p><?php the_title(); ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                        $i++;
                            endwhile;
                        } else {
                            echo esc_html__('No products found', 'kahaf-kit');
                        }
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    <?php
        } );
    }
}
new kitblocks_blog_area();