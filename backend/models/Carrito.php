<?php
class Carrito
{
    public $Producto;

    public function __construct(Producto $Producto)
    {
        $this->Producto = $Producto;
    }

    // getters
    public function getProducto(){
        return $this->Producto;
    }

}