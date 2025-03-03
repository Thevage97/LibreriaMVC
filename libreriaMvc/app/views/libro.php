<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de los Libros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #8B4513;
        }
        .libro {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #4CAF50; /* Verde */
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Detalles de los Libros</h1>
    <?php if (isset($libros) && !empty($libros)): ?>
        <?php foreach ($libros as $libro): ?>
            <div class="libro">
                <h2><?php echo htmlspecialchars($libro['titulo']); ?></h2>
                <p><strong>Autor:</strong> <?php echo htmlspecialchars($libro['autor']); ?></p>
                <p><strong>Editorial:</strong> <?php echo htmlspecialchars($libro['editorial']); ?></p>
                <p><strong>País:</strong> <?php echo htmlspecialchars($libro['pais']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No se encontraron libros.</p>
    <?php endif; ?>
    <a href="/libreriaMvc/public/index.php">Volver a la lista de libros</a>
</body>
</html>