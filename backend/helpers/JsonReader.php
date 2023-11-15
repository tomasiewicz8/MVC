<?php
class JsonReader
{
    // static method so we don't have to create an instance of the object
    public static function readData($filename)
    {
        $jsonData = file_get_contents($filename);
        $data = json_decode($jsonData, true);

        if ($data === null) {
            throw new Exception('Error al decodificar el JSON');
        }

        return $data;
    }
}