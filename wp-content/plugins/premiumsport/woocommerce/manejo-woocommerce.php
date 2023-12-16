<?php

// Incluir archivos necesarios
require_once(plugin_dir_path(__FILE__) . '../api/funciones-api.php'); // Para obtener datos del API externo
require __DIR__ . '/vendor/autoload.php';
use Automattic\WooCommerce\Client;
// También, incluir archivos relacionados con WooCommerce según sea necesario

// Función para actualizar el inventario de WooCommerce desde el API externo
function actualizar_inventario_desde_api_externa() {
    // Instanciar el cliente WooCommerce
    $woocommerce = new Client(
        $api_url,
        $consumer_key,
        $consumer_secret,
        ['version' => 'wc/v3']
    );
    // Obtener productos desde el API externo
    // Obtener los datos de la API externa
    $datos_api_externa = obtener_datos_desde_api_externa(); // Función personalizada para obtener los datos del API

// Obtener todos los productos de WooCommerce
$productos_woocommerce = wc_get_products(array('status' => 'publish'));

foreach ($datos_api_externo as $dato) {
    foreach ($productos_woocommerce as $producto) {
        if ($producto->get_sku() === $dato['CodigoProd']) {
            // Producto encontrado, obtener su ID para la actualización
            $producto_id = $producto->get_id();

            // Agregar datos para la actualización en lote
            $datos_actualizacion[] = [
                'regular_price' => $dato['PrecioVta'],
                'stock_quantity' => $dato['Cantidad'],
                // Otros campos para actualizar según sea necesario
            ];
        }
    }
}


// Preparar los datos para la actualización en lotes
$data = [
    'update' => $datos_actualizacion,
];

// Realizar la actualización en lotes
$resultado_actualizacion = $woocommerce->post('products/batch', $data);

// Verificar el resultado de la actualización
if (!$resultado_actualizacion) {
    echo("❗Error al actualizar productos \n");
} else {
    print("✔ Productos actualizados correctamente \n");
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
function actualizar_producto_especifico($producto_id, $nuevos_datos) {
    $woocommerce = new Client(
        $api_url,
        $consumer_key,
        $consumer_secret,
        ['version' => 'wc/v3']
    );

    $data = [
        'update' => [
            [
                'regular_price' => $nuevos_datos['regular_price'],
                'stock_quantity' => $nuevos_datos['stock_quantity'],
                // Otros campos para actualizar según sea necesario
            ],
        ],
    ];

    $resultado_actualizacion = $woocommerce->post('products/batch', $data);

    if (!$resultado_actualizacion) {
        echo("❗Error al actualizar el producto \n");
    } else {
        print("✔ Producto actualizado correctamente \n");
    }
}
// Hook para detectar la finalización de una compra en WooCommerce y llamar a la función
add_action('woocommerce_order_status_completed', 'enviar_datos_de_compra_a_api_externa');
// Llamar a la función para actualizar el inventario
actualizar_inventario_desde_api_externa();
?>