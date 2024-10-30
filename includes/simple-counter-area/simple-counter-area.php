<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;



class Simple_counter_area {
    function __construct(){
        add_action( 'carbon_fields_register_fields', [$this, 'simple_counter_area_fun'] );          
    }
    function simple_counter_area_fun(){
        wp_enqueue_style( 'k-s-c-o-style', plugins_url("/simple-counter-area.css", __FILE__ ));

        Block::make( __( 'kitblocks counter' ) )

        ->add_tab( __( 'Header Content ' ), array(
            Field::make( 'image', 'simple_counter_area_img', __( 'Image' ) )
            ->set_value_type( 'url' ),
        ) )
        ->add_tab( __( 'Content' ), array(
            Field::make( 'complex', 'simple_counter_area_items', __( 'kitblocks counter area' ) )
            ->set_collapsed( true )
            ->set_layout( 'tabbed-horizontal' )
            ->add_fields( array(
                Field::make( 'text', 'simple_counter_area_count', __( 'count' ) ),

                Field::make( 'text', 'simple_counter_area_title_sub', __( 'sub text one' ) ),

                Field::make( 'text', 'simple_counter_area_title_sub_s', __( 'sub Text two' ) ),
            ) )
        ) )
        
        ->set_category( 'kitblocks' )
        ->set_icon( 'smiley' )
        ->set_keywords( [ __( 'icon' ), __( 'icons' ), __( 'icon block' ) ] )
        ->set_editor_style( 'k-s-c-o-style' )
        ->set_preview_mode( true )
        ->set_render_callback( function ( $fields ) {

    ?>
    <?php
        $simple_counter_area_items = isset($fields['simple_counter_area_items']) ? $fields['simple_counter_area_items'] : '';
        $simple_counter_area_img = isset($fields['simple_counter_area_img']) ? $fields['simple_counter_area_img'] : '';
    ?>
        <div class="k-s-c-o design-one">
            <div class="kitblocks-container">
                <div class="kitblocks-row">
                    <img class="kitblocks-row-img" src="<?php echo esc_url($simple_counter_area_img); ?>" alt=""/>
                    <?php foreach ($simple_counter_area_items as $key => $item) { ?>
                        <div class="kitblocks-col-lg-4 kitblocks-col-md-6 kitblocks-col-12 ">
                            <div class="k-s-c-o-item design-one">
                                <div class="k-s-c-o-item-count"><?php echo wp_kses_post( $item['simple_counter_area_count'] ); ?></div>
                                <div class="k-s-c-o-item-sub"><?php echo wp_kses_post( $item['simple_counter_area_title_sub'] ); ?></div>
                                <div class="k-s-c-o-item-sub_s"><?php echo wp_kses_post( $item['simple_counter_area_title_sub_s'] ); ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php
        } );
    }
}
new Simple_counter_area();