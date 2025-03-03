<?php
class Libro {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    // Método para obtener todos los libros
    public function obtenerLibros() {
        $query = "SELECT * FROM libros";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener una cantidad limitada de libros
    public function obtenerLibrosLimitados($cantidad) {
        $query = "SELECT * FROM libros LIMIT :cantidad";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un libro por ID
    public function obtenerLibroPorId($id) {
        $query = "SELECT * FROM libros WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>