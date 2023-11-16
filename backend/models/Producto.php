<?php
class Producto
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $image;
    public function __construct($id, $name, $price, $description, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }

    // getters 
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getImage()
    {
        return $this->image;
    }

    // setters 
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function getAllInfoProduct()
    {
        return array("id" => $this->id, "name" => $this->name, "price" => $this->price, "description" => $this->description, "image" => $this->image);
    }
}