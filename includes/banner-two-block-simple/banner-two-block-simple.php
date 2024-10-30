<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;



class Kitblocks_simple_banner_two {
    function __construct(){
        add_action( 'carbon_fields_register_fields', [$this, 'kitblocks_simple_banner_two_fun'] );       
    }
    function kitblocks_simple_banner_two_fun(){
        wp_enqueue_style( 'kitblocks-simple-banner-two-style', plugins_url("/banner-two-block-simple.css", __FILE__ ));

        Block::make( __( 'kitblocks simple banner two' ) )

        ->add_tab( __( 'Content' ), array(
            Field::make( 'image', 'kitblocks_simple_banner_two_img', __( 'Image bg' ) )
                ->set_value_type( 'url' ),

            Field::make( 'text', 'kitblocks_simple_banner_two_title_top', __( 'Top Title' ) ),

            Field::make( 'text', 'kitblocks_simple_banner_two_title', __( 'Title' ) ),

            Field::make( 'color', 'kitblocks_simple_banner_two_title_color', 'Background' ),

            Field::make( 'textarea', 'kitblocks_simple_banner_two_content', __( 'content' ) ),

            Field::make( 'text', 'kitblocks_simple_banner_two_btn_o', __( 'Button Text one' ) ),

            Field::make( 'text', 'kitblocks_simple_banner_two_btn_o_l', __( 'Button Text one link' ) ),

            Field::make( 'text', 'kitblocks_simple_banner_two_btn_t', __( 'Button Text two' ) ),

            Field::make( 'text', 'kitblocks_simple_banner_two_btn_t_l', __( 'Button Text ontwoe link' ) ),

        ) )
        
        ->set_category( 'kitblocks' )
        ->set_icon( 'smiley' )
        ->set_keywords( [ __( 'icon' ), __( 'icons' ), __( 'icon block' ) ] )
        ->set_editor_style( 'kitblocks-simple-banner-two-style' )
        ->set_preview_mode( true )
        ->set_render_callback( function ( $fields ) {

    ?>
    <?php
        $kitblocks_simple_banner_two_img = isset($fields['kitblocks_simple_banner_two_img']) ? $fields['kitblocks_simple_banner_two_img'] : '';
        $kitblocks_simple_banner_two_title_top = isset($fields['kitblocks_simple_banner_two_title_top']) ? $fields['kitblocks_simple_banner_two_title_top'] : '';
        $kitblocks_simple_banner_two_title = isset($fields['kitblocks_simple_banner_two_title']) ? $fields['kitblocks_simple_banner_two_title'] : '';
        $kitblocks_simple_banner_two_title_color = isset($fields['kitblocks_simple_banner_two_title_color']) ? $fields['kitblocks_simple_banner_two_title_color'] : '';
        $kitblocks_simple_banner_two_content = isset($fields['kitblocks_simple_banner_two_content']) ? $fields['kitblocks_simple_banner_two_content'] : '';
        $kitblocks_simple_banner_two_btn_o = isset($fields['kitblocks_simple_banner_two_btn_o']) ? $fields['kitblocks_simple_banner_two_btn_o'] : '';
        $kitblocks_simple_banner_two_btn_o_l = isset($fields['kitblocks_simple_banner_two_btn_o_l']) ? $fields['kitblocks_simple_banner_two_btn_o_l'] : '';
        $kitblocks_simple_banner_two_btn_t = isset($fields['kitblocks_simple_banner_two_btn_t']) ? $fields['kitblocks_simple_banner_two_btn_t'] : '';
        $kitblocks_simple_banner_two_btn_t_l = isset($fields['kitblocks_simple_banner_two_btn_t_l']) ? $fields['kitblocks_simple_banner_two_btn_t_l'] : '';
        
        $kitblocks_simple_banner_two_style = "background-image: url(" . esc_url($kitblocks_simple_banner_two_img) . ");";
        $kitblocks_simple_banner_two_title_color_style = "color: " . esc_attr($kitblocks_simple_banner_two_title_color) . ";";
    ?>
        <div class="k-s-b-o content-left" style="<?php echo esc_attr( $kitblocks_simple_banner_two_style ); ?>">
            <div class="kitblocks-container">
                <div class="kitblocks-row">
                    <div class="kitblocks-col-lg-12 kitblocks-col">
                        <div class="k-s-b-o-content">
                            <?php if($kitblocks_simple_banner_two_title_top != '') : ?>
                                <div class="k-s-b-o-content-title-top">
                                    <?php echo wp_kses_post( $kitblocks_simple_banner_two_title_top ); ?>
                                </div>
                            <?php endif;?>
                            <?php if($kitblocks_simple_banner_two_title != '') : ?>
                                <div class="k-s-b-o-content-title"  style="<?php echo esc_attr( $kitblocks_simple_banner_two_title_color_style ); ?>">
                                    <?php echo wp_kses_post( $kitblocks_simple_banner_two_title ); ?>
                                    <p><?php echo wp_kses_post( $kitblocks_simple_banner_two_content ); ?></p>
                                </div>
                            <?php endif;?>
                            <?php if($kitblocks_simple_banner_two_btn_o != '') : ?>
                                <div class="k-s-b-o-content-btn">
                                    <?php if($kitblocks_simple_banner_two_btn_o != '') : ?>
                                        <a class="k-s-b-o-content-btn-o" href="<?php echo esc_url( $kitblocks_simple_banner_two_btn_o_l ); ?>">
                                            <?php echo wp_kses_post( $kitblocks_simple_banner_two_btn_o ); ?>
                                        </a>
                                    <?php endif;?>
                                    <?php if($kitblocks_simple_banner_two_btn_t != '') : ?>
                                        <a class="k-s-b-o-content-btn-t" href="<?php echo esc_url( $kitblocks_simple_banner_two_btn_t_l ); ?>">
                                            <?php echo wp_kses_post( $kitblocks_simple_banner_two_btn_t ); ?>
                                        </a>
                                    <?php endif;?>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        } );
    }
}
new Kitblocks_simple_banner_two();