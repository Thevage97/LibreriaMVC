<?php
// Incluir el modelo de Libro
require_once __DIR__ . '/../models/Libro.php';

class LibreriaController {
    private $libro;

    public function __construct($pdo) {
        // Crear una instancia del modelo Libro, pasando la conexión PDO
        $this->libro = new Libro($pdo);
    }

    // Método para mostrar todos los libros
    public function mostrarLibros($cantidad = null) {
        if ($cantidad) {
            // Si se especifica una cantidad, obtenemos solo esa cantidad de libros
            $libros = $this->libro->obtenerLibrosLimitados($cantidad);
        } else {
            // Si no se especifica cantidad, obtenemos todos los libros
            $libros = $this->libro->obtenerLibros();
        }

        // Incluir la vista libros.php y pasarle los datos de los libros
        require_once __DIR__ . '/../views/libros.php';
    }

    public function mostrarLibrosPorIds($ids) {
        $libros = [];
        foreach ($ids as $id) {
            $libro = $this->libro->obtenerLibroPorId($id);
            if ($libro) {
                $libros[] = $libro; // Agregar el libro al array si se encuentra
            }
        }
    
        // Incluir la vista para mostrar los libros
        require_once __DIR__ . '/../views/libro.php'; // Asegúrate de que esta vista pueda manejar múltiples libros
    }
}
?>