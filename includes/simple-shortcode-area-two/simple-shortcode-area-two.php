<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;



class simple_shortcode_area_two {
    function __construct(){
        add_action( 'carbon_fields_register_fields', [$this, 'simple_shortcode_area_two_fun'] );          
    }
    function simple_shortcode_area_two_fun(){
        wp_enqueue_style( 'k-short-c-o-style-two', plugins_url("/simple-shortcode-area-two.css", __FILE__ ));

        Block::make( __( 'kitblocks shortcode' ) )

        ->add_tab( __( 'Header Content ' ), array(
            Field::make( 'text', 'simple_shortcode_area_two_title', __( 'title' ) ),
            Field::make( 'text', 'simple_shortcode_area_two_title_sub', __( 'title sub' ) ),
            Field::make( 'text', 'simple_shortcode_area_two_shortcode', __( 'shortCode' ) ),
            Field::make( 'image', 'simple_shortcode_area_two_shortcode_img', __( 'Image right' ) )
                ->set_value_type( 'url' ),
        ) )
        
        ->set_category( 'kitblocks' )
        ->set_icon( 'smiley' )
        ->set_keywords( [ __( 'icon' ), __( 'icons' ), __( 'icon block' ) ] )
        ->set_editor_style( 'k-short-c-o-style-two' )
        ->set_preview_mode( true )
        ->set_render_callback( function ( $fields ) {

    ?>
    <?php
        $simple_shortcode_area_two_title = isset($fields['simple_shortcode_area_two_title']) ? $fields['simple_shortcode_area_two_title'] : '';
        $simple_shortcode_area_two_title_sub = isset($fields['simple_shortcode_area_two_title_sub']) ? $fields['simple_shortcode_area_two_title_sub'] : '';
        $simple_shortcode_area_two_shortcode = isset($fields['simple_shortcode_area_two_shortcode']) ? $fields['simple_shortcode_area_two_shortcode'] : '';
        $simple_shortcode_area_two_shortcode_img = isset($fields['simple_shortcode_area_two_shortcode_img']) ? $fields['simple_shortcode_area_two_shortcode_img'] : '';
    ?>
        <div class="k-short-c-o design-two">
            <div class="kitblocks-container">
                <div class="kitblocks-row">
                    <div class="kitblocks-col-md-6  kitblocks-col-12">
                        <div class="k-short-c-o-header">
                            <div class="k-short-c-o-header-title"><?php echo wp_kses_post( $simple_shortcode_area_two_title ); ?></div>
                            <div class="k-short-c-o-header-title-sub"><?php echo wp_kses_post( $simple_shortcode_area_two_title_sub ); ?></div>
                        </div>
                        <div class="k-short-c-o-short-code">
                            <?php echo do_shortcode( $simple_shortcode_area_two_shortcode ); ?>
                        </div>
                    </div>
                    <div class="kitblocks-col-md-6  kitblocks-col-12">
                        <div class="k-short-c-o-img">
                            <img src="<?php echo esc_url( $simple_shortcode_area_two_shortcode_img ); ?>" alt="<?php echo esc_attr( $simple_shortcode_area_two_title ); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        } );
    }
}
new simple_shortcode_area_two();