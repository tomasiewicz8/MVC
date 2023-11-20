<?php
include '../models/Producto.php';
include '../helpers/JsonReader.php';

class ProductoController
{
    public static function getAllProducts($filename, $productName = null)
    {
        try {
            $data = JsonReader::readData($filename);

            $dataFront = array();
            foreach ($data as $productData) {
                $product = new Producto(
                    $productData['id'],
                    $productData['name'],
                    $productData['price'],
                    $productData['description'],
                    $productData['image']
                );

                // stripos: method to find if there is a word in a string
                if ($productName === null || stripos($product->getName(), $productName) !== false) {
                    $dataFront[] = $product->getAllInfoProduct();
                }
            }

            // response has to be a JSON 
            header('Content-Type: application/json');
            echo json_encode($dataFront);
        } catch (Exception $e) {
            // handling exceptions
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}

// Obtener el nombre del producto de la solicitud POST
$productName = isset($_POST['product']) ? $_POST['product'] : null;

// Llamar al método con el nombre del producto (puede ser nulo)
ProductoController::getAllProducts('../database/data.json', $productName);
?>
