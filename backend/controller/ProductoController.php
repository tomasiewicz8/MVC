<?php
include('../models/Producto.php');
include('../helpers/JsonReader.php');
class ProductoController
{
    // static method so we don't have to create an instance of the object
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
                    $productData['description']
                );
                
                $dataFront[] = $product->getAllInfoProduct();
            }

            return $dataFront;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

ProductoController::getAllProducts('../database/data.json');