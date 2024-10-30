<?php
    class KITBLOCKS_Cat {
        public function __construct() {
            add_filter('block_categories', array( $this, 'kitblocks_block_categories' ), 10, 2);
        }
        public function kitblocks_block_categories( $categories, $post ) {
            return array_merge(
                $categories,
                array(
                    array(
                        'slug' => 'kitblocks',
                        'title' => __( 'kitblocks Blocks', 'kitblocks' ),
                        'icon'  => 'admin-customizer',
                    ),
                )
            );
        }
    }
$kitblocks_categories = new KITBLOCKS_Cat();