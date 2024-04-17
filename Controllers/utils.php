<?php

/**
 * @author se utiliza para indicar el nombre del autor del código.
 * @return: Se utiliza para describir el valor de retorno de una función.
 * @throws: Se utiliza para describir las excepciones que puede lanzar una función.
 * @since: Se utiliza para indicar la versión del código en la que se introdujo una función.
 */
class Text
{
    /**
     * ===================================
     * @param Metodo_Estaticos_para_String
     * ===================================
     */
    public static function upper(&$word): string
    {
        return strtoupper($word);
    }
    public static function lower(&$word): string
    {
        return strtolower($word);
    }
    public static function firstWord(string $string): string
    {
        $string = self::lower($string);
        return ucfirst($string);
    }
    public static function allFirstWord(string $string): string
    {
        $string = self::lower($string);
        return ucwords($string);
    }
    public static function eliminarLetras(string $texto): string
    {
        // Expresión regular para encontrar caracteres que no sean números
        $patron = '/[^0-9]/';
        // Reemplaza los caracteres que no sean números con una cadena vacía
        return preg_replace($patron, '', $texto);
    }
    public static function eliminarNumeros(string $texto): string
    {
        // Expresión regular para encontrar caracteres que no sean letras
        $patron = '/[^a-zA-ZáéíóúÁÉÍÓÚ]/';
        // Reemplaza los caracteres que no sean letras con una cadena vacía
        return preg_replace($patron, '', $texto);
    }

    /* Metodo que solo coloca las iniciales de las palabras que sean mayores a 2 letras */
    public static function inicialesMayusculas(string $texto): string // Este metodo recibe un string y lo devuelve con la primera letra en mayusculas y si el string tiene una palabra de dos letras esta la omite
    {
        // Divide el texto en palabras
        $palabras = explode(' ', $texto);

        // Recorre cada palabra
        foreach ($palabras as &$palabra) {
            // Si la palabra tiene más de dos letras, capitaliza la primera letra
            if (strlen($palabra) > 2) {
                $palabra = ucfirst($palabra);
            }
        }

        // Une las palabras en una cadena y devuelve el resultado
        return implode(' ', $palabras);
    }

    public static function agregarPorcentaje(string $string)
    {
        $string .= '%';
        return $string;
    }

    /**
     * =====================================
     * @param Metodos_Estaticos_Verificación
     * =====================================
     */
    public static function post(string $valor): bool // Verifica si existe el valor en el post
    {
        return isset($_POST[$valor]) && !empty($_POST[$valor]); // Si existe devuelve true
    }
    public static function postAsignar($string) // Asigna el valor del post
    {
        return $_POST[$string];
    }
    public static function file($clave) // Verifica si existe el valor en el file
    {
        return isset($_FILES[$clave]) && !empty($_FILES[$clave]['name']); // Si existe devuelve true
    }
    public static function fileAsignar($string) // Asigna el valor del file
    {
        return $_FILES[$string];
    }
    public static function verify($password, $hash) // password es la que se recibe y $hash es la encriptada en la base de datos
    {
        return password_verify($password, $hash); // Si la contraseña es correcta devolvera un true si no devuelve un false
    }
    public static function hash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}

/**
 * @method Multimedia
 */
class Multimedia
{
    public static function convertirBinario($string)
    {
        if (empty($string)) {
            return null;
        }
        $imagenBlob = fopen($string['tmp_name'], 'rb');
        if (!$imagenBlob) {
            throw new Exception('Error al abrir el archivo temporal de la imagen');
        }
        $contenido = '';
        while (!feof($imagenBlob)) {
            $contenido .= fread($imagenBlob, 8192);
        }
        fclose($imagenBlob);
        return $contenido;
    }
    public static function imagenBlob($url)
    {
        $imagen = 'data:image/jpeg;base64,' . base64_encode($url);
        return $imagen;
    }
    public static function size($string)
    {
        $size = $_FILES[$string]['size'];
        return $size;
    }
    public static function verificarMultimedia($string)
    {
        if ($_FILES[$string]['error'] === 0) {
            return true;
        } else {
            // Se ha producido un error durante la subida del archivo
            switch ($_FILES[$string]['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    return "El archivo supera el tamaño máximo permitido por la configuración del servidor";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    return "El archivo supera el tamaño máximo permitido por el formulario HTML";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    return "La subida del archivo se ha interrumpido";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    return "No se ha seleccionado ningún archivo";
                    break;
                default:
                    return "Se ha producido un error desconocido durante la subida del archivo";
            }
        }
    }
}

/**
 * =================================================================
 * @param Clase_Generador 
 * Genera cualquier tipo de contenido visual con estilos bootstrap 5
 * - @param Tablas
 * - @param Cartas div para mostrar un producto con su precio  
 * =================================================================
 */
class Generador
{
    private static function generateCard($product)
    {
        /* $saleBadge = $product['sale_price'] < $product['original_price']
            ? '<div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>'
            : ''; */

        $price = $product['precio'] > 0
            ? '<div class="text-center"><span class="text-muted text-decoration-line-through">' ./*Aqui puede ir el precio de Descuento */ '</span> <span class="text-primary">' . $product['precio'] . '</span></div>'
            : '<div class="text-center">' . $product['precio'] . '</div>';

        return '
            <div class="col mb-5">
                <div class="card h-100">
                    ' . /* $saleBadge */ '
                    <img class="card-img-top" src="' . Multimedia::imagenBlob($product['imagen']) . '" alt="' . $product['nombre_imagen'] . '" style = "object-fit: cover; height: 250px;"/>
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">' . $product['producto'] . '</h5>
                            ' . $price . '
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
    /**
     * Este metodo es el que debe ser llamado para la creacion de los div en la zona de inventario
     */
    public static function generateCards($products)
    {
        $cards = '';
        foreach ($products as $product) {
            $cards .= self::generateCard($product);
        }
        return '
            <section class="py-3">
                <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        ' . $cards . '
                    </div>
                </div>
            </section>
        ';
    }

    /**
     * Genera el HTML de una tabla con datos y botones de acción
     *
     * @param array $headers Encabezados de la tabla
     * @param array $datos Datos de la tabla
     * @param bool $editar Indica si se deben mostrar botones de edición
     * @param bool $eliminar Indica si se deben mostrar botones de eliminación
     * @return string Devuelve el HTML de la tabla
     */
    public static function tablas(array $headers, array $datos, bool $editar, bool $eliminar, $titulo): string
    {
        $idField = 'id';
        // Inicia el HTML de la tabla
        $html = '<table class="table table-striped w-75">';

        // Encabezados de la tabla
        $html .= '<thead>';
        $html .= '<tr>';
        foreach ($headers as $header) {
            $html .= '<th>' . htmlspecialchars($header) . '</th>';
        }
        $html .= '</tr>';
        $html .= '</thead>';

        // Cuerpo de la tabla con datos y botones
        $html .= '<tbody>';
        foreach ($datos as $fila) {
            $html .= '<tr>';

            // Recorre las celdas de datos con foreach
            foreach ($fila as $celda) {
                $html .= '<td>' . $celda . '</td>';
            }

            // Botones de acción (edición y eliminación)
            if ($editar || $eliminar) {
                $html .= '<td class="d-flex flex-row gap-2">';

                // Formulario para editar
                if ($editar) {
                    $html .= '<form action="../../Controllers/modificaciones.php" method="post">';
                    $html .= '<input type="hidden" name="id" value="' . $fila[$idField] . '">';
                    $html .= '<input type="hidden" name="accion" value="editar-' . $titulo . '">';
                    $html .= '<button type="submit" class="btn btn-primary"><i class="bi-pencil-square"></i></button>';
                    $html .= '</form>';
                }

                // Formulario para eliminar
                if ($eliminar) {
                    $html .= '<form action="../../Controllers/modificaciones.php" method="post">';
                    $html .= '<input type="hidden" name="id" value="' . $fila[$idField] . '">';
                    $html .= '<input type="hidden" name="accion" value="borrar-' . $titulo . '">';
                    $html .= '<button type="submit" class="btn btn-danger"><i class="bi-trash3"></i></button>';
                    $html .= '</form>';
                }

                $html .= '</td>';
            }

            $html .= '</tr>';
        }
        $html .= '</tbody>';

        $html .= '</table>';

        return $html;
    }

    /**
     * @method Genera una etiqueta html dinamica y automatica
     */
    public static function selectEtiqueta($data, $name, $id, $selected = null)
    {
        $select = '<select name="' . $name . '" id="' . $id . '">';
        foreach ($data as $item) {
            $select .= '<option value="' . $item[$id] . '"';
            if ($selected && $selected == $item[$id]) {
                $select .= ' selected';
            }
            $select .= '>' . $item[$name] . '</option>';
        }
        $select .= '</select>';
        return $select;
    }
}
