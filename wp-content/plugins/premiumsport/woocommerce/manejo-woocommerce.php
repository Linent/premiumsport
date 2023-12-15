<?php

// Incluir archivos necesarios
require_once(plugin_dir_path(__FILE__) . '../api/funciones-api.php'); // Para obtener datos del API externo
// También, incluir archivos relacionados con WooCommerce según sea necesario

// Función para actualizar el inventario de WooCommerce desde el API externo
function actualizar_inventario_desde_api_externa() {
    // Obtener productos desde el API externo
    $productos_api = obtener_productos_desde_api_externo(); // Necesitarás implementar esta función
    
    // Obtener productos de WooCommerce
    $productos_woocommerce = wc_get_products(array('status' => 'publish'));

    // Comparar y actualizar el inventario
    foreach ($productos_api as $producto_api) {
        foreach ($productos_woocommerce as $producto_woocommerce) {
            // Comparar utilizando algún identificador único (ID, SKU, etc.)
            if ($producto_api['id'] === $producto_woocommerce->get_id()) {
                // Actualizar inventario en WooCommerce con información del API externo
                $nuevo_inventario = $producto_api['inventario']; // Ajusta según la estructura de datos del API externo
                $producto_woocommerce->set_stock_quantity($nuevo_inventario);
                $producto_woocommerce->save(); // Guardar cambios en el producto
                break; // Romper el bucle una vez que se actualiza el producto
            }
        }
    }
}
// Función para manejar los datos de la compra y enviarlos a la API externa
function enviar_datos_de_compra_a_api_externa($order_id) {
    // Obtener detalles de la orden
    $order = wc_get_order($order_id);

    // Preparar datos de la compra para enviar a la API externa
    $productos_comprados = array();
    foreach ($order->get_items() as $item_id => $item) {
        $producto = $item->get_product();
        $producto_info = array(
            'sku' => $producto->get_sku(),
            'cantidad' => $item->get_quantity(),
            // Agregar más detalles del producto si es necesario
        );
        $productos_comprados[] = $producto_info;
    }

    // Otros detalles de la compra
    $metodo_de_pago = $order->get_payment_method();

    // Combinar todos los datos
    $datos_compra = array(
        'productos' => $productos_comprados,
        'metodo_pago' => $metodo_de_pago,
        // Agregar más detalles de la compra según lo que necesites
    );

    // Enviar datos a la API externa
    $respuesta_api = enviar_solicitud_a_api_externa($datos_compra);

    // Manejar la respuesta de la API según sea necesario
    if ($respuesta_api === false) {
        // Manejar errores si la solicitud falla
    } else {
        // Procesar la respuesta exitosa de la API
    }
}

// Hook para detectar la finalización de una compra en WooCommerce y llamar a la función
add_action('woocommerce_order_status_completed', 'enviar_datos_de_compra_a_api_externa');
// Llamar a la función para actualizar el inventario
actualizar_inventario_desde_api_externa();
?>