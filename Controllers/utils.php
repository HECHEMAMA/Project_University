<?php

/**
 * @author se utiliza para indicar el nombre del autor del código.
 * @return: Se utiliza para describir el valor de retorno de una función.
 * @throws: Se utiliza para describir las excepciones que puede lanzar una función.
 * @since: Se utiliza para indicar la versión del código en la que se introdujo una función.
 */

/**
 * ===================================
 * @param Metodo_Estaticos_para_String
 * ===================================
 */
function upper($word): string
{
    return strtoupper($word);
}
function lower($word): string
{
    return strtolower($word);
}
function firstWord(string $string): string
{
    $string = lower($string);
    return ucfirst($string);
}
function allFirstWord(string $string): string
{
    $string = lower($string);
    return ucwords($string);
}
function eliminarLetras(string $texto): string
{
    // Expresión regular para encontrar caracteres que no sean números
    $patron = '/[^0-9]/';
    // Reemplaza los caracteres que no sean números con una cadena vacía
    return preg_replace($patron, '', $texto);
}
function eliminarNumeros(string $texto): string
{
    // Expresión regular para encontrar caracteres que no sean letras
    $patron = '/[^a-zA-ZáéíóúÁÉÍÓÚ]/';
    // Reemplaza los caracteres que no sean letras con una cadena vacía
    return preg_replace($patron, '', $texto);
}

/* Metodo que solo coloca las iniciales de las palabras que sean mayores a 2 letras */
function inicialesMayusculas(string $texto): string // Este metodo recibe un string y lo devuelve con la primera letra en mayusculas y si el string tiene una palabra de dos letras esta la omite
{
    // Divide el texto en palabras
    $palabras = explode(' ', $texto);

    // Recorre cada palabra
    foreach ($palabras as &$palabra) {
        // Si la palabra tiene más de dos letras, capitaliza la primera letra
        if (strlen($palabra) > 2) {
            $palabra = ucfirst(lower($palabra));
        }
    }

    // Une las palabras en una cadena y devuelve el resultado
    return implode(' ', $palabras);
}

function agregarPorcentaje(string $string)
{
    $string .= '%';
    return $string;
}

/**
 * =====================================
 * @param Metodos_Estaticos_Verificación
 * =====================================
 */
function post(string $valor): bool // Verifica si existe el valor en el post
{
    return isset($_POST[$valor]) && !empty($_POST[$valor]); // Si existe devuelve true
}
function postAsignar($string) // Asigna el valor del post
{
    return $_POST[$string];
}
function multimedia($clave) // Verifica si existe el valor en el file
{
    return isset($_FILES[$clave]) && !empty($_FILES[$clave]['name']); // Si existe devuelve true
}
function fileAsignar($string) // Asigna el valor del file
{
    return $_FILES[$string];
}
function verify($password, $hash) // password es la que se recibe y $hash es la encriptada en la base de datos
{
    return password_verify($password, $hash); // Si la contraseña es correcta devolvera un true si no devuelve un false
}
function hashPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

/**
 * @method Multimedia
 */
function convertirBinario($string)
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
function imagenBlob($url)
{
    $imagen = 'data:image/jpeg;base64,' . base64_encode($url);
    return $imagen;
}
function size($string)
{
    $size = $_FILES[$string]['size'];
    return $size;
}
function verificarMultimedia($string)
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

/**
 * =================================================================
 * @param Clase_Generador 
 * Genera cualquier tipo de contenido visual con estilos bootstrap 5
 * - @param Tablas
 * - @param Cartas div para mostrar un producto con su precio  
 * =================================================================
 */
function generateCard($product)
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
                    <img class="card-img-top" src="' . imagenBlob($product['imagen']) . '" alt="' . $product['nombre_imagen'] . '" style = "object-fit: cover; height: 250px;"/>
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
function generateCards($products)
{
    $cards = '';
    foreach ($products as $product) {
        $cards .= generateCard($product);
    }
    return '
            <section class="py-3">
                <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" id="">
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
function tablas(array $headers, array $datos, bool $editar, bool $eliminar, array $titulo = [], $action = 'edit.php'): string
{
    $idField = 'id';
    // Inicia el HTML de la tabla
    $html = '<table class="table table-striped w-75 my-5" id="tabla">';

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
                // $html .= '<form action="/project-php/Controllers/modificaciones.php" method="post">';
                // $html .= '<input type="hidden" name="id" value="' . $fila[$idField] . '">';
                // $html .= '<input type="hidden" name="accion" value="editar-' . $titulo . '">';
                $html .= '<a href="' . $action . '?id=' . $fila[$idField] . '" class="btn btn-primary"><i class="bi-pencil-square"></i></a>';
                // $html .= '</form>';
            }

            // Formulario para eliminar
            if ($eliminar) {
                $html .= '<form action="/project-php/Controllers/' . $titulo[0] . '.php" method="post">';
                $html .= '<input type="hidden" name="id" value="' . $fila[$idField] . '">';
                // $html .= '<input type="hidden" name="accion" value="borrar-' . $titulo . '">';
                // onclick="return eliminar()
                $html .= '<button type="submit" name="accion" value="borrar-' . $titulo[1] . '" class="btn btn-danger"><i class="bi-trash3"></i></button>';
                // $html .= '<a href="index.php?id=' . $fila[$idField] . '" class="btn btn-danger"><i class="bi-trash3"></i></a>';
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

function mostrarRoles($roles)
{
    // Check if the roles array is not empty
    if (!empty($roles)) {
        // Display roles
        echo "<div class='form-group mb-3'>";
        echo "<label for='role' class='form-label'>Select a role:</label>";
        echo "<select class='form-select' id='role'>";
        foreach ($roles as $role) {
            echo "<option value='" . $role["id"] . "'>" . $role["role_name"] . "</option>";
        }
        echo "</select>";
        echo "</div>";
    } else {
        echo "No roles found.";
    }
}

function alert($mensaje, bool $bueno)
{
    ($bueno)
        ? $html = '<div class = "alert alert-success">'
        : $html = '<div class= "alert alert-danger">';
    $html .= $mensaje;
    $html .= '</div>';
    return $html;
}

function formulario(array $label, array $valueInput, string $action)
{
    $html = '<form action="' . $action . '" method="POST" class="row d-flex justify-content-center">';
    for ($i = 0; $i < count($label); $i++) {
        $html .= '<div class="form-floating mb-3">';
        die();
        $html .= '<input type="text" class="form-control" name="' . $label[$i] . '" id="' . $label[$i] . '" placeholder="' . $valueInput[$i] . '" />';
        $html .= '<label for="' . $label[$i] . '">' . $label[$i] . '</label>';
        $html .= '</div>';
    }
    $html .= '</form>';
    return $html;
}

/**
 * @method Genera una etiqueta html dinamica y automatica
 */
function selectEtiqueta($data, $name, $id, $selected = null)
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
function verificarSesion()
{
    if (!isset($_SESSION)) {
        header("Location: ../index.php");
        exit();
    }
}
