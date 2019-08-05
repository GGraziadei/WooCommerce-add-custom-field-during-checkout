<?php
/**

* Add custom field to the checkout page

*/

add_action('woocommerce_after_order_notes', 'custom_checkout_field');

function custom_checkout_field($checkout)

{

echo '<div id="custom_checkout_field"><h2>' . __('Contatto Telegram') . '</h2>';

woocommerce_form_field('custom_field_name', array(

'type' => 'text',

'class' => array(

'my-field-class form-row-wide'

) ,

'label' => __('CUSTOM LABEL') ,

'placeholder' => __('@username') ,

) ,

$checkout->get_value('custom_field_name'));

echo '</div>';

}

/**

* Update the value given in custom field

*/

add_action('woocommerce_checkout_update_order_meta', 'custom_checkout_field_update_order_meta');

function custom_checkout_field_update_order_meta($order_id)

{

if (!empty($_POST['custom_field_name'])) {

update_post_meta($order_id, 'Contatto Telegram --> ',sanitize_text_field($_POST['custom_field_name']));

}

}
