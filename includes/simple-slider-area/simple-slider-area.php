<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;



class Kitblocks_simple_slider {
    function __construct(){
        add_action( 'carbon_fields_register_fields', [$this, 'kitblocks_simple_slider_fun'] );      
        // add_action( 'enqueue_block_editor_assets', array( $this, 'kitblocks_simple_slider_js' ) ); 
        add_action( 'wp_footer', array( $this, 'kitblocks_simple_slider_js' ) );    
    }
    public function kitblocks_simple_slider_js(){
        wp_enqueue_script( 'owl-scripts', plugins_url("../../assets/js/owl.js", __FILE__ ), array( 'jquery' ), time(), true );
        wp_enqueue_script( 'simple-slider-scripts', plugins_url("/simple-slider-area.js", __FILE__ ), array( 'jquery' ), time(), true );
    }
    function kitblocks_simple_slider_fun(){
        wp_enqueue_style( 'owl-style', plugins_url("../../assets/css/owl.css", __FILE__ ), false, time() );
        wp_enqueue_style( 'k-s-s-o-style', plugins_url("/simple-slider-area.css", __FILE__ ));

        Block::make( __( 'kitblocks simple slider' ) )

        ->add_tab( __( 'Header Content ' ), array(
           
            Field::make( 'text', 'kitblocks_simple_slider_header_title', __( 'Title' ) ),

            Field::make( 'textarea', 'kitblocks_simple_slider_header_title_sub', __( 'sub Text one' ) ),
        ) )
        ->add_tab( __( 'Content' ), array(
            Field::make( 'complex', 'kitblocks_simple_slider_items', __( 'kitblocks simple slider' ) )
            ->set_collapsed( true )
            ->set_layout( 'tabbed-horizontal' )
            ->add_fields( array(
                Field::make( 'image', 'kitblocks_simple_slider_img', __( 'Image bg' ) )
                    ->set_value_type( 'url' ),
                Field::make( 'textarea', 'kitblocks_simple_slider_title', __( 'Title' ) ),

                Field::make( 'text', 'kitblocks_simple_slider_title_sub', __( 'sub Text one' ) ),

                Field::make( 'text', 'kitblocks_simple_slider_link', __( 'link' ) ),
            ) )
        ) )
        
        ->set_category( 'kitblocks' )
        ->set_icon( 'smiley' )
        ->set_keywords( [ __( 'icon' ), __( 'icons' ), __( 'icon block' ) ] )
        ->set_editor_style( 'k-s-s-o-style' )
        ->set_preview_mode( true )
        ->set_render_callback( function ( $fields ) {

    ?>
    <?php
        $kitblocks_simple_slider_items = isset($fields['kitblocks_simple_slider_items']) ? $fields['kitblocks_simple_slider_items'] : '';
        $kitblocks_simple_slider_header_title = isset($fields['kitblocks_simple_slider_header_title']) ? $fields['kitblocks_simple_slider_header_title'] : '';
        $kitblocks_simple_slider_header_title_sub = isset($fields['kitblocks_simple_slider_header_title_sub']) ? $fields['kitblocks_simple_slider_header_title_sub'] : '';
    ?>
        <div class="k-h-area">
            <div class="kitblocks-container">
                <div class="kitblocks-row">
                    <div class="kitblocks-col-9">
                        <h2><?php echo wp_kses_post( $kitblocks_simple_slider_header_title); ?></h2>
                        <p><?php echo wp_kses_post( $kitblocks_simple_slider_header_title_sub ); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="k-s-s-o content-center">
            <div class="kitblocks-container">
                <div class="kitblocks-row">
                    <div class="kitblocks-col-12">
                        <div class=" kitblocks-item-slider-one k-s-s-o-sider kb-slider owl-carousel owl-theme" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true,"dots": false, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 500, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "1" }, "800" :{ "items" : "2" }, "1024":{ "items" : "3" }, "1366":{ "items" : "3" }}}'>
                            <?php foreach ($kitblocks_simple_slider_items as $key => $item) { ?>
                                    <div class="k-s-s-o-item">
                                        <div class="k-s-s-o-item-header">
                                            <p><?php echo wp_kses_post( $item['kitblocks_simple_slider_title'] ); ?></p>
                                            <span><?php echo wp_kses_post( $item['kitblocks_simple_slider_title_sub'] ); ?></span>
                                        </div>
                                        <a href="<?php echo esc_url($item['kitblocks_simple_slider_link']); ?>">
                                            <div class="k-s-s-o-item-img">
                                                <img src="<?php echo esc_url($item['kitblocks_simple_slider_img']); ?>" alt=""/>
                                                <div class="k-s-s-o-item-img-overlay">
                                                    <span>
                                                        <?php echo wp_kses_post( $item['kitblocks_simple_slider_title'] ); ?></br>
                                                        <?php echo wp_kses_post( $item['kitblocks_simple_slider_title_sub'] ); ?>
                                                    </span>
                                                </div>   
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
new Kitblocks_simple_slider();