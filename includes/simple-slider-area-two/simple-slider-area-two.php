<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;



class Kitblocks_simple_slider_two {
    function __construct(){
        add_action( 'carbon_fields_register_fields', [$this, 'kitblocks_simple_slider_two_fun'] );      
        add_action( 'wp_footer', array( $this, 'kitblocks_simple_slider_two_js' ) );    
    }
    public function kitblocks_simple_slider_two_js(){
        wp_enqueue_script( 'owl-scripts', plugins_url("../../assets/js/owl.js", __FILE__ ), array( 'jquery' ), time(), true );
        wp_enqueue_script( 'simple-slider-scripts-two', plugins_url("/simple-slider-area-two.js", __FILE__ ), array( 'jquery' ), time(), true );
    }
    function kitblocks_simple_slider_two_fun(){
        wp_enqueue_style( 'owl-style', plugins_url("../../assets/css/owl.css", __FILE__ ), false, time() );
        wp_enqueue_style( 'k-s-s-o-style-two', plugins_url("/simple-slider-area-two.css", __FILE__ ));

        Block::make( __( 'kitblocks simple slider' ) )

        ->add_tab( __( 'Content' ), array(
            Field::make( 'complex', 'kitblocks_simple_slider_two_items', __( 'kitblocks simple slider two' ) )
            ->set_collapsed( true )
            ->set_layout( 'tabbed-horizontal' )
            ->add_fields( array(
                Field::make( 'image', 'kitblocks_simple_slider_two_img', __( 'Image bg' ) )
                    ->set_value_type( 'url' ),
                Field::make( 'textarea', 'kitblocks_simple_slider_two_title', __( 'Title' ) ),

                Field::make( 'text', 'kitblocks_simple_slider_two_link', __( 'link' ) ),
            ) )
        ) )
        
        ->set_category( 'kitblocks' )
        ->set_icon( 'smiley' )
        ->set_keywords( [ __( 'icon' ), __( 'icons' ), __( 'icon block' ) ] )
        ->set_editor_style( 'k-s-s-o-style-two' )
        ->set_preview_mode( true )
        ->set_render_callback( function ( $fields ) {

    ?>
    <?php
        $kitblocks_simple_slider_two_items = isset($fields['kitblocks_simple_slider_two_items']) ? $fields['kitblocks_simple_slider_two_items'] : '';
    ?>
        <div class="k-s-s-o content-center design-two">
            <div class="kitblocks-container">
                <div class="kitblocks-row">
                    <div class="kitblocks-col-md-12">
                        <div class="kitb-uglbog-header">
                            <h2>Services </h2>
                        </div>
                    </div>
                    <div class="kitblocks-col-12">
                        <div class=" kitblocks-item-slider-one k-s-s-o-sider kb-slider owl-carousel owl-theme" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true,"dots": false, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 500, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "1" }, "800" :{ "items" : "2" }, "1024":{ "items" : "3" }, "1366":{ "items" : "3" }}}'>
                            <?php foreach ($kitblocks_simple_slider_two_items as $key => $item) { ?>
                                    <div class="k-s-s-o-item">
                                        <a href="<?php echo esc_url($item['kitblocks_simple_slider_two_link']); ?>">
                                            <div class="k-s-s-o-item-img">
                                                <img src="<?php echo esc_url($item['kitblocks_simple_slider_two_img']); ?>" alt=""/>  
                                            </div>   
                                            <div class="k-s-s-o-item-header">
                                                <p><?php echo wp_kses_post( $item['kitblocks_simple_slider_two_title'] ); ?></p>
                                            </div>
                                        </a>
                                    </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        } );
    }
}
new Kitblocks_simple_slider_two();