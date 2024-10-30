<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;



class Kitblocks_simple_banner {
    function __construct(){
        add_action( 'carbon_fields_register_fields', [$this, 'kitblocks_simple_banner_fun'] );       
    }
    function kitblocks_simple_banner_fun(){
        wp_enqueue_style( 'kitblocks-simple-banner-style', plugins_url("/banner-block-simple.css", __FILE__ ));

        Block::make( __( 'kitblocks simple banner' ) )

        ->add_tab( __( 'Content' ), array(
            Field::make( 'image', 'kitblocks_simple_banner_img', __( 'Image bg' ) )
                ->set_value_type( 'url' ),
            Field::make( 'textarea', 'kitblocks_simple_banner_title', __( 'Title' ) ),

            Field::make( 'textarea', 'kitblocks_simple_banner_title_sub', __( 'Title small' ) ),

            Field::make( 'text', 'kitblocks_simple_banner_btn_o', __( 'Button Text one' ) ),

            Field::make( 'text', 'kitblocks_simple_banner_btn_o_l', __( 'Button Text one link' ) ),

            Field::make( 'text', 'kitblocks_simple_banner_btn_t', __( 'Button Text two' ) ),

            Field::make( 'text', 'kitblocks_simple_banner_btn_t_l', __( 'Button Text ontwoe link' ) ),


        ) )
        
        ->set_category( 'kitblocks' )
        ->set_icon( 'smiley' )
        ->set_keywords( [ __( 'icon' ), __( 'icons' ), __( 'icon block' ) ] )
        ->set_editor_style( 'kitblocks-simple-banner-style' )
        ->set_preview_mode( true )
        ->set_render_callback( function ( $fields ) {

    ?>
    <?php
        $kitblocks_simple_banner_img = isset($fields['kitblocks_simple_banner_img']) ? $fields['kitblocks_simple_banner_img'] : '';
        $kitblocks_simple_banner_title = isset($fields['kitblocks_simple_banner_title']) ? $fields['kitblocks_simple_banner_title'] : '';
        $kitblocks_simple_banner_title_sub = isset($fields['kitblocks_simple_banner_title_sub']) ? $fields['kitblocks_simple_banner_title_sub'] : '';
        $kitblocks_simple_banner_btn_o = isset($fields['kitblocks_simple_banner_btn_o']) ? $fields['kitblocks_simple_banner_btn_o'] : '';
        $kitblocks_simple_banner_btn_o_l = isset($fields['kitblocks_simple_banner_btn_o_l']) ? $fields['kitblocks_simple_banner_btn_o_l'] : '';
        $kitblocks_simple_banner_btn_t = isset($fields['kitblocks_simple_banner_btn_t']) ? $fields['kitblocks_simple_banner_btn_t'] : '';
        $kitblocks_simple_banner_btn_t_l = isset($fields['kitblocks_simple_banner_btn_t_l']) ? $fields['kitblocks_simple_banner_btn_t_l'] : '';
        
        $kitblocks_simple_banner_style = "background-image: url(" . esc_url($kitblocks_simple_banner_img) . ");";
    ?>
        <div class="k-s-b-o " style="<?php echo esc_attr( $kitblocks_simple_banner_style ); ?>">
            <div class="kitblocks-container">
                <div class="kitblocks-row">
                    <div class="kitblocks-col-lg-6">
                        <div class="k-s-b-o-content">
                            <div class="k-s-b-o-content-title">
                                <?php echo wp_kses_post( $kitblocks_simple_banner_title ); ?>
                            </div>
                            <div class="k-s-b-o-content-title-sub">
                                <?php echo wp_kses_post( $kitblocks_simple_banner_title_sub ); ?>
                            </div>
                            <div class="k-s-b-o-content-btn">
                                <?php if($kitblocks_simple_banner_btn_o != '') : ?>
                                    <a class="k-s-b-o-content-btn-o" href="<?php echo esc_url( $kitblocks_simple_banner_btn_o_l ); ?>">
                                        <?php echo wp_kses_post( $kitblocks_simple_banner_btn_o ); ?>
                                    </a>
                                <?php endif;?>
                                <?php if($kitblocks_simple_banner_btn_t != '') : ?>
                                    <a class="k-s-b-o-content-btn-t" href="<?php echo esc_url( $kitblocks_simple_banner_btn_t_l ); ?>">
                                        <?php echo wp_kses_post( $kitblocks_simple_banner_btn_t ); ?>
                                    </a>
                                <?php endif;?>
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
new Kitblocks_simple_banner();