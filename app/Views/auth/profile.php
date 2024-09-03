<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Perfil de Usuario</h2>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Información del Usuario</h5>
                <p class="card-text"><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p class="card-text"><strong>Nombre:</strong> <?php echo $user['nombre']; ?></p>
                <p class="card-text"><strong>Estado:</strong> <?php echo $user['estado'] ? 'Activo' : 'Inactivo'; ?></p>
                <p class="card-text"><strong>URL:</strong> <?php echo $user['url']; ?></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>