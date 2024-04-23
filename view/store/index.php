<?php
require '/opt/lampp/htdocs/project-php/Controllers/VentaController.php';
render('header',['view','html']);
render('nav',['view','html']);
// include_once "/opt/lampp/htdocs/project-php/view/html/header.php";
// include_once "/opt/lampp/htdocs/project-php/view/html/nav.php";
// include_once "/opt/lampp/htdocs/project-php/Controllers/VentaController.php";
// include_once "/opt/lampp/htdocs/project-php/Controllers/utils.php";
$header = [
    "",
    "Nombre del Producto",
    "Precio Original",
    "Precio de Venta",
    "",
];
$productos = [
    [
        'id' => 1,
        'name' => 'Sandalia Marina',
        // 'image_url' => 'https://dummyimage.com/450x300/dee2e6/6c757d.jpg',
        'original_price' => '$40.00',
        'sale_price' => '$30.00'
    ],
    [
        'id' => 2,
        'name' => 'Special Item',
        // 'image_url' => 'https://dummyimage.com/450x300/dee2e6/6c757d.jpg',
        'original_price' => '$20.00',
        'sale_price' => '$18.00'
    ],
    [
        'id' => 3,
        'name' => 'Special Item',
        // 'image_url' => 'https://dummyimage.com/450x300/dee2e6/6c757d.jpg',
        'original_price' => '$20.00',
        'sale_price' => '$18.00'
    ],
];

$factura = [
    "IVA",
    "SubTotal",
    "TOTAL",
];
$total = [
    [
        "20%",
        "19 $",
        "30 $",
    ]
];
?>
<form action="#" method="post" class="container m-5">
    <h1 class="h1">Vender</h1>
    <div class="row">
        <div class="col m-2">
            <h3 class="h3">Cliente</h3>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" />
                <label for="nombre">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" />
                <label for="nombre">Apellido</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" />
                <label for="nombre">Cedula</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" />
                <label for="nombre">Direccion</label>
            </div>
            <div class="col">
                <div class="col m-2">
                    <h3 class="h3">Buscar Producto</h3>
                    <!-- Buscar Productos -->
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Buscar Producto">
                        <button class="btn btn-primary" type="submit"><i class="bi-search"></i> Buscar</button>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <?= tablas($factura, $total, false, false, "producto") ?>
                </div>
                <div class="row my-5 d-flex flex-row flex-nowrap justify-content-center">
                    <button type="submit" class="btn btn-primary w-25 m-2"><i class="bi-currency-dollar"></i> Vender</button>
                    <button type="submit" class="btn btn-danger w-25 m-2" style="white-space: nowrap;"><i class="bi-trash3"></i> Productos</button>
                </div>
            </div>
        </div>
        <div class="col m-2">
            <h3 class="h3">Tienda</h3>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="BOTIMENDO" />
                <label for="nombre">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="000000000" />
                <label for="nombre">RIF</label>
            </div>
            <div class="col mt-2">
                <h3 class="h3">Productos a Comprar</h3>
                <?= tablas($header, $productos, false, true, "producto") ?>
            </div>
        </div>
    </div>
</form>
<?php render('footer',['view','html']) ?>