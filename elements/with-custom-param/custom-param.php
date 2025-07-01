<?php
/*
 * Custom param type registration and styles for WPBakery
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register the custom param type for checkboxes.
 */
add_action('init', function() {
    if (function_exists('vc_add_shortcode_param')) {
        vc_add_shortcode_param('custom_radio', function($settings, $value) {
            $options = isset($settings['options']) ? $settings['options'] : [];
            $param_name = esc_attr($settings['param_name']);
            $selected = array_map('trim', explode(',', $value));
            $output = '<div class="custom-checkbox-param" style="border: 1px solid #e0e0e0; background: #fafbfc; border-radius: 8px; padding: 15px 10px; margin-bottom: 10px; display: inline-block;">';
            foreach ($options as $val => $label) {
                $checked = in_array($val, $selected) ? 'checked' : '';
                $output .= '<label style="margin-right:18px; margin-bottom: 8px; display: inline-block; font-weight: 500;">';
                $output .= '<input type="checkbox" class="custom-checkbox-input" value="' . esc_attr($val) . '" ' . $checked . '> ' . esc_html($label);
                $output .= '</label>';
            }
            $output .= '<input type="hidden" class="wpb_vc_param_value" name="' . $param_name . '" value="' . esc_attr($value) . '">';
            $output .= '<script>
            jQuery(function($){
                $(".custom-checkbox-param .custom-checkbox-input").on("change", function(){
                    var vals = [];
                    $(this).closest(".custom-checkbox-param").find(".custom-checkbox-input:checked").each(function(){
                        vals.push($(this).val());
                    });
                    $(this).closest(".custom-checkbox-param").find("input.wpb_vc_param_value").val(vals.join(",")).trigger("change");
                });
            });
            </script>';
            $output .= '</div>';
            return $output;
        });
    }
});

/**
 * Enqueue custom CSS for the param.
 */
add_action('admin_enqueue_scripts', function() {
    wp_enqueue_style('vc-dev-example-custom-checkbox-param', plugins_url('assets/css/assets.css', __FILE__));
});
// Enqueue custom CSS for the param on the frontend
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('vc-dev-example-custom-checkbox-param', plugins_url('assets/css/assets.css', __FILE__));
});
