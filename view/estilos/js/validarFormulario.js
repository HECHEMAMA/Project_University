//ahora los nombres de las expresiones
//deben coincidir con los nombres en los inputs (name)
const expresiones = {
  usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  password: /^.{4,12}$/, // 4 a 12 digitos.
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  telefono: /^\d{7,14}$/, // 7 a 14 numeros.
};

/**
 * Validación de Código
 */
const codigoInput = document.getElementById('codigo');
const codigoError = document.getElementById('codigoError');

const validarCodigo = () => {
  // Elimina espacios en blanco del valor ingresado
  const codigoValor = codigoInput.value.trim().toUpperCase();

  const regexCodigo = /^[0-9A-Z]+$/;

  if (codigoValor) {
    if (!regexCodigo.test(codigoValor)) {
      codigoError.textContent = "Error: El código no es válido. Debe contener letras y/o números";
      codigoError.style.display = "block";
      codigoInput.classList.add('is-invalid');
      return;
    }
    codigoError.textContent = "";
    codigoError.style.display = "none";
    codigoInput.classList.remove('is-invalid');
    codigoInput.classList.add('is-valid');
    codigoInput.value = codigoValor;
  } else {
    codigoError.textContent = "Código es Obligatorio";
    codigoError.style.display = "block";
    codigoInput.classList.add('is-invalid');
  }
};

codigoInput.addEventListener('keyup', validarCodigo);
codigoInput.addEventListener('blur', validarCodigo);
/**
 * Validación de nombres
*/
const nombreInput = document.getElementById('nombre');
const nombreError = document.getElementById('nombreError');
const validarNombre = () => {
  const nombreValor = nombreInput.value.trim().charAt(0);

  if (nombreValor) {
    const regexNombre = /^[a-zA-Z\_][a-zA-Z]*$/;
    if (!regexNombre.test(nombreValor)) {
      nombreError.textContent = "Error: El nombre solo puede contener letras, tildes y espacios";
      nombreError.style.display = "block";
      nombreInput.classList.add('is-invalid');
      return;
    }

    nombreError.textContent = "";
    nombreError.style.display = "none";
    nombreInput.classList.remove('is-invalid');
    nombreInput.classList.add('is-valid');
    nombreInput.value = nombreValor.toUpperCase() + nombreInput.value.slice(1);
  } else {
    nombreError.textContent = "Error: El nombre es obligatorio";
    nombreError.style.display = "block";
    nombreInput.classList.add('is-invalid');
  }
};
nombreInput.addEventListener('keyup', validarNombre);
nombreInput.addEventListener('blur', validarNombre);

/**
 * Validar Descripción 
 * falla algo
 */
const descripcionInput = document.getElementById('descripcion');
const descripcionError = document.getElementById('descripcionError');
const validarDescripcion = () => {
  const descripcionValue = descripcionInput.value.trim().charAt(0);
  const regexDescripcion = /^[a-zA-Z0-9]+$/;
  if (descripcionValue) {
    if (!regexDescripcion.test(descripcionValue)) {
      descripcionError.textContent = "Error: La descripción no es válida";
      descripcionError.style.display = "block";
      descripcionInput.classList.add('is-invalid');
      return;
    }
    descripcionError.textContent = "";
    descripcionError.style.display = "none";
    descripcionInput.classList.remove('is-invalid');
    descripcionInput.classList.add('is-valid');
    descripcionInput.value = descripcionValue.toUpperCase() + descripcionInput.value.slice(1);
  } else {
    descripcionError.textContent = "Error: La descripción es obligatoria";
    descripcionError.style.display = "block";
    descripcionInput.classList.add('is-invalid');
  }
};
descripcionInput.addEventListener('keyup', validarDescripcion);
descripcionInput.addEventListener('blur', validarDescripcion);

/**
 * Validar Nombre Imagen
 */
/**
 * Validar Nombre Imagen
 */
const nombreImagenInput = document.getElementById('nombreImagen');
const nombreImagenError = document.getElementById('nombreImagenError');
const nombreImagenLimite = 10;

const validarNombreImagen = () => {
  const nombreImagenValue = nombreImagenInput.value.trim();
  const regexNombreImagen = /^[a-zA-Z\_][a-zA-Z]*$/;
  const nombreImagenLongitud = nombreImagenValue.length;

  if (nombreImagenValue) {
    if (!regexNombreImagen.test(nombreImagenValue) || nombreImagenValue.startsWith('_') || nombreImagenValue.endsWith('_')) {
      nombreImagenError.textContent = "Error: El nombre de la imagen no es válido. Debe comenzar y terminar con una letra o número, y no puede contener espacios.";
      nombreImagenError.style.display = "block";
      nombreImagenInput.classList.add('is-invalid');
      return;
    }
    if (nombreImagenLongitud > nombreImagenLimite) {
      nombreImagenError.textContent = "Error: El nombre de la imagen no puede tener más de 10 caracteres";
      nombreImagenError.style.display = "block";
      nombreImagenInput.classList.add('is-invalid');
      return;
    }

    nombreImagenError.textContent = "";
    nombreImagenError.style.display = "none";
    nombreImagenInput.classList.remove('is-invalid');
    nombreImagenInput.classList.add('is-valid');
    nombreImagenInput.value = nombreImagenValue;
    return;
  } else {
    nombreImagenError.textContent = "Error: El nombre de la imagen es obligatorio";
    nombreImagenError.style.display = "block";
    nombreImagenInput.classList.add('is-invalid');
  }
};


nombreImagenInput.addEventListener('keyup', validarNombreImagen);
nombreImagenInput.addEventListener('blur', validarNombreImagen);

/**
 * Validacion del input tipo file
 */
const inputFile = document.getElementById("imagen");
const errorImagen = document.getElementById("imagenError");
const validateFile = () => {
  const archivoSeleccionado = Array.from(inputFile.files)[0];
  const fileSize = archivoSeleccionado.size;
  const maxSize = 40 * 1024 * 1024; // 40 MB en bytes

  if (fileSize > maxSize) {
    errorImagen.textContent =
      "El archivo multimedia es demasiado pesado. Max(40MB).";
    inputFile.classList.add("is-invalid");
    return;
  }

  fetch(archivoSeleccionado.url)
    .then((response) => response.blob())
    .then((blob) => blob.type)
    .then((fileType) => {
      if (["image/jpeg", "image/jpg", "image/png"].includes(fileType)) {
        errorImagen.textContent = "Solo se permiten imágenes JPEG, PNG o JPG.";
        inputFile.classList.add("is-invalid");
        return;
      }

      errorImagen.textContent = "";
      inputFile.classList.remove("is-invalid");
      inputFile.classList.add("is-valid");
    });
};
inputFile.addEventListener("keyup", validateFile);
inputFile.addEventListener('blur', validateFile);

/**
 * Validación de Login
 */
