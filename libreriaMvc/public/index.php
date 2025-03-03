<?php
// Incluir la clase del controlador
require_once __DIR__ . '/../app/controllers/LibreriaController.php';

// Incluir la configuración de la base de datos
require_once __DIR__ . '/../config/database.php';

// Obtener la ruta de la URL
$request = $_SERVER['REQUEST_URI'];

// Crear una instancia del controlador
$controller = new LibreriaController($pdo);

// Función para obtener el ID del libro desde un mapa
function obtenerIdLibro($ruta) {
    $mapa = [
        '/libreriaMvc/public/index.php/unLibro' => 1,
        '/libreriaMvc/public/index.php/dosLibros' => 2,
        '/libreriaMvc/public/index.php/tresLibros' => 3,
        '/libreriaMvc/public/index.php/cuatroLibros' => 4,
        '/libreriaMvc/public/index.php/cincoLibros' => 5,
        '/libreriaMvc/public/index.php/seisLibros' => 6,
        '/libreriaMvc/public/index.php/sieteLibros' => 7,
        '/libreriaMvc/public/index.php/ochoLibros' => 8,
        '/libreriaMvc/public/index.php/nueveLibros' => 9,
        '/libreriaMvc/public/index.php/diezLibros' => 10,
        '/libreriaMvc/public/index.php/onceLibros' => 11,
        '/libreriaMvc/public/index.php/doceLibros' => 12,
        '/libreriaMvc/public/index.php/treceLibros' => 13,
        '/libreriaMvc/public/index.php/catorceLibros' => 14,
        '/libreriaMvc/public/index.php/quinceLibros' => 15,
        '/libreriaMvc/public/index.php/dieciseisLibros' => 16,
        '/libreriaMvc/public/index.php/diecisieteLibros' => 17,
        '/libreriaMvc/public/index.php/dieciochoLibros' => 18,
        '/libreriaMvc/public/index.php/diecinueveLibros' => 19,
        '/libreriaMvc/public/index.php/veinteLibros' => 20,
        '/libreriaMvc/public/index.php/veintiunoLibros' => 21,
        '/libreriaMvc/public/index.php/veintidosLibros' => 22,
        '/libreriaMvc/public/index.php/veintitresLibros' => 23,
        '/libreriaMvc/public/index.php/veinticuatroLibros' => 24,
        '/libreriaMvc/public/index.php/veinticincoLibros' => 25,
        '/libreriaMvc/public/index.php/veintiseisLibros' => 26,
        '/libreriaMvc/public/index.php/veintisieteLibros' => 27,
        '/libreriaMvc/public/index.php/veintiochoLibros' => 28,
        '/libreriaMvc/public/index.php/veintinueveLibros' => 29,
        '/libreriaMvc/public/index.php/treintaLibros' => 30,
        '/libreriaMvc/public/index.php/treintaunoLibros' => 31,
        '/libreriaMvc/public/index.php/treintadosLibros' => 32,
        '/libreriaMvc/public/index.php/treintatresLibros' => 33
    ];

    // Extraer el ID del libro de la ruta
    return isset($mapa[$ruta]) ? $mapa[$ruta] : null;
}
// Extraer los parámetros de la URL
$partesRuta = explode('/', trim($request, '/'));
$primerParametro = isset($partesRuta[3]) ? $partesRuta[3] : null; // Primer libro
$segundoParametro = isset($partesRuta[4]) ? $partesRuta[4] : null; // Segundo libro

// Obtener el ID del primer libro
$idLibro1 = obtenerIdLibro($request);

// Si hay un segundo parámetro, obtener el ID del segundo libro
$idLibro2 = $segundoParametro ? obtenerIdLibro('/libreriaMvc/public/index.php/' . $segundoParametro) : null;

if ($idLibro1) {
    // Si se encuentra el ID del primer libro
    if ($idLibro2) {
        // Si hay un segundo libro, mostrar ambos
        $controller->mostrarLibrosPorIds([$idLibro1, $idLibro2]);
    } else {
        // Si solo hay un libro, mostrarlo
        $controller->mostrarLibrosPorIds([$idLibro1]);
    }
} else {
    // Si no se encuentra el ID, mostrar todos los libros
    $controller->mostrarLibros();
}
?>