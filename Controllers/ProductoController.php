<?php
require "render.php";
render('utils',['Controllers']);
render('Producto', ['Models']);
render('Imagen', ['Models']);


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

    // Metodos de la clase


    /**
     * ==========================
     * @param Inicializa_Variable 
     * Inicializan las variables
     * ==========================
     */

    public function __construct(private string $accion)
    {
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
        $string = upper($string);
        $this->codigo = $string;
    }
    private function setNombre($string)
    {
        $string = firstWord(lower($string));
        $this->nombre = $string;
    }
    private function setDescripcion($string)
    {
        $string = firstWord(lower($string));
        $this->descripcion = $string;
    }

    private function setPrecio($float)
    {
        $float = eliminarLetras($float);
        $this->precio = (floatval($float));
    }
    private function setCantidad($string)
    {
        $string = eliminarLetras($string);
        $this->cantidad = $string;
    }
    private function setCategoria(int $int)
    {
        $int = eliminarLetras($int);
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
        return generateCards(Producto::mostrarProductosDiv());
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

if (post('accion')) {
    $producto = new ProductoController(postAsignar('accion'));
}
