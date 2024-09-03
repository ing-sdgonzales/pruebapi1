<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Dashboard</h2>
        <div class="mt-3">
            <a href="/test/public/profile" class="btn btn-primary">Perfil</a>
        </div>
        <div class="mt-3">
            <h3>Cargar CV</h3>
            <form action="/test/public/upload-cv" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="cv" class="form-label">Selecciona tu CV (PDF, máximo 5MB):</label>
                    <input type="file" class="form-control" id="cv" name="cv" accept=".pdf" required>
                </div>
                <button type="submit" class="btn btn-primary">Cargar CV</button>
            </form>
        </div>
        <div class="mt-3">
            <h3>Visualizar CV</h3>
            <form action="/test/public/view-cv" method="GET">
                <button type="submit" class="btn btn-secondary">Visualizar CV</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>