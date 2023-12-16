<?php
// Ubicación: /nombre-de-tu-plugin/api/funciones-api.php

// Incluir el archivo de configuración
require_once(plugin_dir_path(__FILE__) . '../config.php');

function enviar_solicitud_a_api_externa($datos) {
    //global $api_url, $consumer_key, $consumer_secret, $api_key;

    $url_api = $api_url . '/Productos'; // Usar la ruta base de la API desde la configuración
    
    $args = array(
        'headers' => array(
            'Authorization' => 'Basic ' . base64_encode($consumer_key . ':' . $consumer_secret),
            // Puedes incluir $api_key si es necesario para la autenticación
        )
    );

    // Resto del código para enviar la solicitud a la API
    // ...
}
function obtener_productos_desde_api_externo() {
    //global $api_url, $consumer_key, $consumer_secret;

    $url_api = $api_url . '/Productos'; // Usar la ruta base de la API desde la configuración
    
    $args = array(
        'headers' => array(
            'Authorization' => 'Basic ' . base64_encode($consumer_key . ':' . $consumer_secret),
            // Puedes incluir $api_key si es necesario para la autenticación
        )
    );

    $response = wp_remote_get($url_api);

    if (is_wp_error($response)) {
        // Manejar errores si la solicitud falla
        return false;
    }

    $productos_api = json_decode(wp_remote_retrieve_body($response), true);
    return $productos_api;
}
?>