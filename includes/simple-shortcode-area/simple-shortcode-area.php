<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;



class Simple_shortcode_area {
    function __construct(){
        add_action( 'carbon_fields_register_fields', [$this, 'simple_shortcode_area_fun'] );          
    }
    function simple_shortcode_area_fun(){
        wp_enqueue_style( 'k-short-c-o-style', plugins_url("/simple-shortcode-area.css", __FILE__ ));

        Block::make( __( 'kitblocks shortcode' ) )

        ->add_tab( __( 'Header Content ' ), array(
            Field::make( 'textarea', 'simple_shortcode_area_svg', __( 'icon svg' ) ),
            Field::make( 'text', 'simple_shortcode_area_title', __( 'title' ) ),
            Field::make( 'text', 'simple_shortcode_area_shortcode', __( 'shortCode' ) ),
        ) )
        
        ->set_category( 'kitblocks' )
        ->set_icon( 'smiley' )
        ->set_keywords( [ __( 'icon' ), __( 'icons' ), __( 'icon block' ) ] )
        ->set_editor_style( 'k-short-c-o-style' )
        ->set_preview_mode( true )
        ->set_render_callback( function ( $fields ) {

    ?>
    <?php
        $simple_shortcode_area_svg = isset($fields['simple_shortcode_area_svg']) ? $fields['simple_shortcode_area_svg'] : '';
        $simple_shortcode_area_title = isset($fields['simple_shortcode_area_title']) ? $fields['simple_shortcode_area_title'] : '';
        $simple_shortcode_area_shortcode = isset($fields['simple_shortcode_area_shortcode']) ? $fields['simple_shortcode_area_shortcode'] : '';
    ?>
        <div class="k-short-c-o design-one">
            <div class="kitblocks-container">
                <div class="kitblocks-row">
                    <div class="kitblocks-col-12">
                        <div class="k-short-c-o-header">
                            <div class="k-short-c-o-header-icon"><?php echo $simple_shortcode_area_svg; ?></div>
                            <div class="k-short-c-o-header-title"><?php echo wp_kses_post( $simple_shortcode_area_title ); ?></div>
                        </div>
                        <div class="k-short-c-o-short-code">
                            <?php echo do_shortcode( $simple_shortcode_area_shortcode ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        } );
    }
}
new Simple_shortcode_area();