<?php
# include_once "/opt/lampp/htdocs/tienda_botimendo/Models/conexion.php";
/**
 * ["name"]     => string(12) "Pegaucho.jpg" 
 * ["full_path"]=> string(12) "Pegaucho.jpg" 
 * ["type"]     => string(10) "image/jpeg" 
 * ["tmp_name"] => string(25) "/opt/lampp/temp/phplvMfSs" 
 * ["error"]    => int(0) 
 * ["size"]     => int(139497) 
 */
class Imagen
{
    private $imagen_blob;
    private string $nombre;

    public function __construct()
    {
        $this->setImagenBlob('imagen');
        $this->setNombreImagen('nombreImagen');
    }
    public function registrarImagen()
    {
        $sql = "INSERT INTO Imagen (nombre_imagen, `url`) VALUES (?,?);";
        try {
            $respuesta = Conexion::execute($sql, [$this->getNombreImagen(), $this->getImagenBlob()]);
            if ($respuesta) {
                $sql = "SELECT * FROM Imagen WHERE nombre_imagen = ?";
                $producto = Conexion::query($sql, [$this->getNombreImagen()]);
                foreach ($producto as $key) {
                    $id_imagen = $key['id_imagen'];
                }
                return  $id_imagen;
            } else {
                throw new Exception("ERROR no se guardó la imagen", 1);
            }
        } catch (PDOException $e) {
            throw new Exception("ERROR no se guardar la imagen: " . $e->getMessage(), 1);
        }
    }

    private function setImagenBlob($string)
    {
        $verificar = text::file($string);
        if ($verificar) {
            if (Multimedia::size($string) < 41943040) {
                $this->imagen_blob = Text::fileAsignar($string);
            } else {
                return;
            }
            $this->imagen_blob = Multimedia::convertirBinario($this->imagen_blob);
        } else {
            throw new Exception("Variable \$_FILE esta vacia", 1);
            
        }
    }
    private function setNombreImagen($string)
    {
        $valor = Text::post($string);
        if ($valor) {
            $this->nombre = Text::postAsignar($string);
        }
    }
    private function getNombreImagen()
    {
        if (!isset($this->nombre)) {
            return null;
        }
        return $this->nombre;
    }

    private function getImagenBlob()
    {
        return $this->imagen_blob;
    }
}
