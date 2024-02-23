<?php
/**
 * Plugin Name: Snorkellifts plugin
 * Plugin URI: http://seerox.com
 * Description: Just a wordpress plugin for snorkellifts.com. [srx_snk_all_associated_products] this shortcode for all associated products or [srx_snk_products_by_accessory_package] this shortcode display all associated accessory packages
 * Version: 1.3
 * Author: Seerox
 * Author URI: http://seerox.com
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 * Requires at least: 3.8
 * Tested up to: 4.8.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

register_activation_hook( __FILE__, 'activate_snorkellifts_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_snorkellifts_plugin' );

function activate_snorkellifts_plugin() {
    // Activation code here
}

function deactivate_snorkellifts_plugin() {
    // Deactivation code here
}

function srx_snk_all_associated_products($atts) {
    $atts = shortcode_atts(
        array(),
        $atts,
        'srx_snk_all_associated_products'
    );

    global $post;

        $product_title = get_the_title();
        $term = get_term_by('name', $product_title, 'package');

        if ($term) {
            $args = array(
                'post_type' => 'product',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'package',
                        'field'    => 'term_id',
                        'terms'    => $term->term_id,
                    ),
                ),
                
                'posts_per_page' => -1,
            );

            $products_query = new WP_Query($args);

            $output = '<ul class="srx-sc-equipment">';
            if ($products_query->have_posts()) {
                while ($products_query->have_posts()) {
                    $products_query->the_post();
                    $output .= '<li><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></li>';
                }
                wp_reset_postdata();
            } else {
                $output .= '<p class="snk-srx-empty" style="margin-bottom: 0px;">No equipment associated with this package.</p>';
            }
            $output .= '</ul>';

            return $output;
        } else {
            return '<p class="snk-srx-empty" style="margin-bottom: 0px;">No associated package found.</p>';
        }
}

add_shortcode('srx_snk_all_associated_products', 'srx_snk_all_associated_products');


function srx_snk_products_by_accessory_package($atts) {
    $atts = shortcode_atts(
        array(),
        $atts,
        'srx_snk_products_by_accessory_package'
    );
    global $product;
        $product_id = $product->get_id();
        $accessory_packages = wp_get_post_terms($product_id, 'package', array('fields' => 'names'));

        // Output the matching products
        $output = '<ul class="srx-sc-package" style="padding: 0px 20px;">';
        if (!empty($accessory_packages)) {
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
            );

            $products_query = new WP_Query($args);

            if ($products_query->have_posts()) {
                while ($products_query->have_posts()) {
                    $products_query->the_post();
                    $product_title = get_the_title();
                    
                    // Check if the product title matches any accessory package term
                    if (in_array($product_title, $accessory_packages)) {
                        $output .= '<li><a href="' . esc_url(get_permalink()) . '">' . esc_html($product_title) . '</a></li>';
                    }
                }
            } else {
                $output .= '<p class="snk-srx-empty" style="margin-bottom: 0px;">No equipment associated with this package.</p>';
            }

            wp_reset_postdata();
        } else {
            $output .= '<p class="snk-srx-empty" style="margin-bottom: 0px;">No associated package found.</p>';
        }
        $output .= '</ul>';

        return $output;
}

add_shortcode('srx_snk_products_by_accessory_package', 'srx_snk_products_by_accessory_package');
