<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;



class Simple_testimonial_area {
    function __construct(){
        add_action( 'carbon_fields_register_fields', [$this, 'simple_testimonial_area_fun'] );       
        add_action( 'wp_footer', array( $this, 'simple_testimonial_area_js' ) );         
    }
    function simple_testimonial_area_js(){
        wp_enqueue_script( 'magnific-popup', plugins_url("../../assets/js/magnific-popup.min.js", __FILE__ ), array( 'jquery' ), time(), true );
        wp_enqueue_script( 'simple-testimonial-area', plugins_url("/simple-testimonial-area.js", __FILE__ ), array( 'jquery' ), time(), true );
    }
    function simple_testimonial_area_fun(){
        wp_enqueue_style( 'magnific-popup', plugins_url("../../assets/css/magnific-popup.css", __FILE__ ), false, time() );
        wp_enqueue_style( 'k-testimonial-c-o-style', plugins_url("/simple-testimonial-area.css", __FILE__ ));

        Block::make( __( 'kitblocks testimonial' ) )

        ->add_tab( __( 'Header Content ' ), array(
            Field::make( 'textarea', 'simple_testimonial_area_title', __( 'content' ) ),
            Field::make( 'text', 'simple_testimonial_area_url', __( 'url' ) ),
            Field::make( 'text', 'simple_testimonial_area_btn_title', __( 'title btn' ) ),
        ) )
        
        ->add_tab( __( 'Video Content ' ), array(
            Field::make( 'image', 'simple_testimonial_area_video_bg', __( 'video bg' ) )
                ->set_value_type( 'url' ),
            Field::make( 'text', 'simple_testimonial_area_video_url', __( 'url' ) ),
        ) )
        
        ->set_category( 'kitblocks' )
        ->set_icon( 'smiley' )
        ->set_keywords( [ __( 'icon' ), __( 'icons' ), __( 'icon block' ) ] )
        ->set_editor_style( 'k-testimonial-c-o-style' )
        ->set_preview_mode( true )
        ->set_render_callback( function ( $fields ) {

    ?>
    <?php
        $simple_testimonial_area_title = isset($fields['simple_testimonial_area_title']) ? $fields['simple_testimonial_area_title'] : '';
        $simple_testimonial_area_url = isset($fields['simple_testimonial_area_url']) ? $fields['simple_testimonial_area_url'] : '';
        $simple_testimonial_area_btn_title = isset($fields['simple_testimonial_area_btn_title']) ? $fields['simple_testimonial_area_btn_title'] : '';

        $simple_testimonial_area_video_url = isset($fields['simple_testimonial_area_video_url']) ? $fields['simple_testimonial_area_video_url'] : '';
        $simple_testimonial_area_video_bg = isset($fields['simple_testimonial_area_video_bg']) ? $fields['simple_testimonial_area_video_bg'] : '';

        $simple_testimonial_area_video_bg_style = "background-image: url(" . esc_url($simple_testimonial_area_video_bg) . ");";
    ?>
        <div class="k-testimonial-c-o design-two">
            <div class="kitblocks-container">
                <div class="kitblocks-row">
                    <div class="kitblocks-col-md-5 kitblocks-col-12">
                        <div class="k-testimonial-c-o-video"  style="<?php echo esc_attr( $simple_testimonial_area_video_bg_style ); ?>">
                            <a class="popup-youtube" href="<?php echo esc_url( $simple_testimonial_area_video_url ); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
                                    <path d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="kitblocks-col-md-7 kitblocks-col-12">
                        <div class="k-testimonial-c-o-header-area">
                            <div class="k-testimonial-c-o-bottom">
                                <div class="k-testimonial-c-o-bottom-top">
                                    <h3><?php echo wp_kses_post( $simple_testimonial_area_title ); ?></h3>
                                </div>
                                <div class="k-testimonial-c-o-bottom-bottom">
                                    <a href="<?php echo esc_url( $simple_testimonial_area_url ); ?>"><?php echo wp_kses_post( $simple_testimonial_area_btn_title ); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        } );
    }
}
new Simple_testimonial_area();