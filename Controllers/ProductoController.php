<?php
require "/opt/lampp/htdocs/tienda_botimendo/Controllers/utils.php";
include_once "/opt/lampp/htdocs/tienda_botimendo/Models/Producto.php";
include_once "/opt/lampp/htdocs/tienda_botimendo/Models/Imagen.php";


/**
 * @author Jeremmy Gonzalez
 * @param Clase_Producto
 */
class ProductoController
{
    /**
     * ==========================
     * @param ATRIBUTOS_PRODUCTO
     * variables
     * ==========================
     */
    private string $codigo;
    private string $nombre;
    private string $descripcion;
    private float $precio;
    private string $cantidad;
    private int $categoria;
    private $imagen; // Se almacena el id_imagen

    /**
     * ============================================================================================
     * Variable que recibe las Acciones del Metodo POST de todo formulario que involucre un Usuario
     * @param accion => El metodo @author $POST['accion'] 
     * - registrar-producto
     * - modificar-producto
     * - mostrar-producto
     * ============================================================================================
     */
    private string $accion;

    // Metodos de la clase


    /**
     * ==========================
     * @param Inicializa_Variable 
     * Inicializan las variables
     * ==========================
     */

    public function __construct($accion)
    {
        $this->accion = $accion;
        $this->ejecutarAccion();
    }
    /**
     * ========================================
     * @method Metodos Set
     * Asigna valor a los atributos de la calse
     * ========================================
     */
    private function setCodigo($string)
    {
        $string = Text::upper($string);
        $this->codigo = $string;
    }
    private function setNombre($string)
    {
        $string = Text::firstWord(Text::lower($string));
        $this->nombre = $string;
    }
    private function setDescripcion($string)
    {
        $string = Text::firstWord(Text::lower($string));
        $this->descripcion = $string;
    }

    private function setPrecio($float)
    {
        $float = Text::eliminarLetras($float);
        $this->precio = (floatval($float));
    }
    private function setCantidad($string)
    {
        $string = Text::eliminarLetras($string);
        $this->cantidad = $string;
    }
    private function setCategoria(int $int)
    {
        $int = Text::eliminarLetras($int);
        $this->categoria = $int;
    }
    private function setImagen()
    {
        $imagen = new Imagen;
        $this->imagen = $imagen->registrarImagen();
    }
    /**
     * ================================================
     * @method Metodos_GET
     * @return getX => Devolvera el valor las variables
     * ================================================
     */
    private function getCodigo(): string
    {
        return $this->codigo;
    }

    private function getNombre()
    {
        return $this->nombre;
    }

    private function getDescripcion()
    {
        return $this->descripcion;
    }

    private function getPrecio()
    {
        return $this->precio;
    }

    private function getCantidad(): string
    {
        return $this->cantidad;
    }

    private function getCategoria(): string
    {
        return $this->categoria;
    }
    private function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param Metodos_Procesos
     * Apartir de aqui la clase realiza los procesos para:
     * - Registrar
     * - Editar
     * - Mostrar
     * - Eliminar/Desactivar
     */

    private function registrarProducto()
    {
        $this->setCodigo($_POST['codigo']);
        $this->setNombre($_POST['nombre']);
        $this->setDescripcion($_POST['descripcion']);
        $this->setPrecio($_POST['precio']);
        $this->setCantidad($_POST['cantidad']);
        $this->setCategoria($_POST['categoria']);
        $this->setImagen();
        try {
            $verificacion = Producto::registrarProducto([
                $this->getCodigo(), $this->getNombre(), $this->getDescripcion(),
                $this->getPrecio(), $this->getCantidad(), $this->getCategoria(),
                $this->getImagen()
            ]);
            if ($verificacion) {
                header("location: ../view/inventary/index.php");
            } else {
                throw new Exception("Error inesperado al registrar el producto", 1);
            }
        } catch (PDOException $e) {
            throw new Exception("Error al registrar los datos del Producto " . $e->getMessage(), 1);
        }
    }
    public static function editarProducto($id_producto)
    {
        var_dump($id_producto);
    }
    public static function borrarProducto($id_producto)
    {
        var_dump($id_producto);
    }
    public static function mostrarProducto()
    {
        return Generador::generateCards(Producto::mostrarProductosDiv());
    }

    private function ejecutarAccion()
    {
        switch ($this->accion) {
            case 'registrar-producto':
                $this->registrarProducto();
                break;
            case 'editar-producto':
                break;
            case 'deshabilitar-producto':
                break;
            default:
                exit;
                break;
        }
    }
}

if (Text::post('accion')) {
    $producto = new ProductoController($_POST['accion']);
}
