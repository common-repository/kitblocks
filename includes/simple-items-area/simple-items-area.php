<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;



class Kitblocks_simple_items {
    function __construct(){
        add_action( 'carbon_fields_register_fields', [$this, 'kitblocks_simple_items_fun'] );      
    }
    function kitblocks_simple_items_fun(){
        wp_enqueue_style( 'k-s-i-o-style', plugins_url("/simple-items-area.css", __FILE__ ));

        Block::make( __( 'kitblocks simple items' ) )

        ->add_tab( __( 'Header Content ' ), array(
           
            Field::make( 'text', 'kitblocks_simple_items_header_title', __( 'Title' ) ),

            Field::make( 'textarea', 'kitblocks_simple_items_header_title_sub', __( 'sub Text one' ) ),
        ) )
        
        ->add_tab( __( 'Content' ), array(
            Field::make( 'complex', 'kitblocks_simple_items_items', __( 'kitblocks simple items' ) )
            ->set_collapsed( true )
            ->set_layout( 'tabbed-horizontal' )
            ->add_fields( array(
                Field::make( 'image', 'kitblocks_simple_items_img', __( 'Image bg' ) )
                    ->set_value_type( 'url' ),
                Field::make( 'textarea', 'kitblocks_simple_items_title', __( 'Title' ) ),

                Field::make( 'text', 'kitblocks_simple_items_link', __( 'link' ) ),
            ) )
        ) )
        
        ->set_category( 'kitblocks' )
        ->set_icon( 'smiley' )
        ->set_keywords( [ __( 'icon' ), __( 'icons' ), __( 'icon block' ) ] )
        ->set_editor_style( 'k-s-i-o-style' )
        ->set_preview_mode( true )
        ->set_render_callback( function ( $fields ) {

    ?>
    <?php
        $kitblocks_simple_items_items = isset($fields['kitblocks_simple_items_items']) ? $fields['kitblocks_simple_items_items'] : '';
        $kitblocks_simple_items_header_title = isset($fields['kitblocks_simple_items_header_title']) ? $fields['kitblocks_simple_items_header_title'] : '';
        $kitblocks_simple_items_header_title_sub = isset($fields['kitblocks_simple_items_header_title_sub']) ? $fields['kitblocks_simple_items_header_title_sub'] : '';
    ?>
        <div class="k-s-i-o-header-area">
            <div class="kitblocks-container">
                <div class="kitblocks-row">
                    <div class="kitblocks-col-9">
                        <h2><?php echo wp_kses_post( $kitblocks_simple_items_header_title); ?></h2>
                        <p><?php echo wp_kses_post( $kitblocks_simple_items_header_title_sub ); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="k-s-i-o content-center">
            <div class="kitblocks-container">
                <div class="kitblocks-row">
                        <?php foreach ($kitblocks_simple_items_items as $key => $item) { ?>
                            <div class="kitblocks-col-lg-3 kitblocks-col-md-4 kitblocks-col-12">
                                <a href="<?php echo esc_url($item['kitblocks_simple_items_link']); ?>">
                                    <div class="k-s-i-o-item">
                                        <div class="k-s-i-o-item-img">
                                            <img src="<?php echo esc_url($item['kitblocks_simple_items_img']); ?>" alt=""/>
                                            <div class="k-s-i-o-item-img-overlay">
                                                <span>
                                                    <?php echo wp_kses_post( $item['kitblocks_simple_items_title'] ); ?></br>
                                                </span>
                                            </div>   
                                        </div>   
                                        <div class="k-s-i-o-item-header">
                                            <p><?php echo wp_kses_post( $item['kitblocks_simple_items_title'] ); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    <?php
        } );
    }
}
new Kitblocks_simple_items();