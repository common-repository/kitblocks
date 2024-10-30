<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;



class Kitblocks_simple_items_two {
    function __construct(){
        add_action( 'carbon_fields_register_fields', [$this, 'kitblocks_simple_items_two_fun'] );      
    }
    function kitblocks_simple_items_two_fun(){
        wp_enqueue_style( 'simple-items-two-area', plugins_url("/simple-items-two-area.css", __FILE__ ));

        Block::make( __( 'kitblocks simple items two' ) )

        
        ->add_tab( __( 'Content' ), array(
            Field::make( 'complex', 'kitblocks_simple_items_two_items', __( 'kitblocks simple items' ) )
            ->set_collapsed( true )
            ->set_layout( 'tabbed-horizontal' )
            ->add_fields( array(
                Field::make( 'image', 'kitblocks_simple_items_two_img', __( 'Image bg' ) )
                    ->set_value_type( 'url' ),
                Field::make( 'textarea', 'kitblocks_simple_items_two_title', __( 'Title' ) ),

                Field::make( 'text', 'kitblocks_simple_items_two_link', __( 'link' ) ),
            ) )
        ) )
        
        ->set_category( 'kitblocks' )
        ->set_icon( 'smiley' )
        ->set_keywords( [ __( 'icon' ), __( 'icons' ), __( 'icon block' ) ] )
        ->set_editor_style( 'simple-items-two-area' )
        ->set_preview_mode( true )
        ->set_render_callback( function ( $fields ) {

    ?>
    <?php
        $kitblocks_simple_items_two_items = isset($fields['kitblocks_simple_items_two_items']) ? $fields['kitblocks_simple_items_two_items'] : '';
    ?>
        <div class="k-i-t-a">
            <div class="kitblocks-container">
                <div class="kitblocks-row">
                    <?php foreach ($kitblocks_simple_items_two_items as $key => $item) { ?>
                        <div class="kitblocks-col-lg-3 kitblocks-col-md-4 kitblocks-col-12">
                            <div class="k-s-i-o-item">
                                <a href="<?php echo esc_url($item['kitblocks_simple_items_two_link']); ?>">
                                    <div class="k-s-i-o-item-img">
                                        <img src="<?php echo esc_url($item['kitblocks_simple_items_two_img']); ?>" alt=""/>
                                    </div>   
                                    <div class="k-s-i-o-item-header">
                                        <p><?php echo wp_kses_post( $item['kitblocks_simple_items_two_title'] ); ?></p>
                                    </div>
                                </a>
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
new Kitblocks_simple_items_two();