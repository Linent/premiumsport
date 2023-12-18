<?php
/*
Plugin Name: PremiumSport
Description: Importación de productos desde una API externa a WooCommerce utilizando el API REST.
Version: 1.0
Author: Kumo Soft
*/

// Activar el plugin
function activar_mi_plugin() {
    require_once(plugin_dir_path(__FILE__) . './api/funciones-api.php');
    require_once(plugin_dir_path(__FILE__) . './woocommerce/manejo-woocommerce.php');

}
register_activation_hook(__FILE__, 'activar_mi_plugin');

// Desactivar el plugin
function desactivar_mi_plugin() {
    // Código de desactivación
}
register_deactivation_hook(__FILE__, 'desactivar_mi_plugin');

