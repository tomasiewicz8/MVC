<?php
include '../models/Producto.php';
include '../helpers/JsonReader.php';

class ProductoController
{
    public static function getAllProducts($filename)
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

                $dataFront[] = $product->getAllInfoProduct();
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

ProductoController::getAllProducts('../database/data.json');
