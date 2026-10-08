<?php
// Si la petición es GET, muestra el formulario
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'captura.html';
    exit;
}

// Si la petición es POST, procesa los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Control de inyección de código (XSS)
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''), ENT_QUOTES, 'UTF-8');
    $alias = htmlspecialchars(trim($_POST['alias'] ?? ''), ENT_QUOTES, 'UTF-8');
    $edad = htmlspecialchars(trim($_POST['edad'] ?? ''), ENT_QUOTES, 'UTF-8');
    
    // Tratamiento del array de checkboxes
    $armas = isset($_POST['armas']) && is_array($_POST['armas']) 
        ? implode(', ', array_map('htmlspecialchars', $_POST['armas'])) 
        : 'Ninguna';
        
    $magia = htmlspecialchars($_POST['magia'] ?? 'No', ENT_QUOTES, 'UTF-8');

    // Directorio de subidas y ruta de la calavera dentro de uploads/
    $uploadDir = 'uploads/';
    $calaveraPath = 'uploads/calavera.png';

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $imagenPath = '';
    $imagenHeader = '';
    $errorMensaje = '';

    // Comprobar si se ha intentado subir un archivo
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] !== UPLOAD_ERR_NO_FILE) {
        $file = $_FILES['imagen'];

        // Validación en servidor: Error nativo, extensión PNG, tipo MIME y tamaño max 10KB (10240 bytes)
        $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $mimeType = !empty($file['tmp_name']) ? mime_content_type($file['tmp_name']) : '';
        $maxSize = 10 * 1024; // 10 KB

        if ($file['error'] !== UPLOAD_ERR_OK || $file['size'] > $maxSize || $fileExt !== 'png' || $mimeType !== 'image/png') {
            $imagenHeader = 'No se subió ninguna imagen.';
            $imagenPath = $calaveraPath;
            $errorMensaje = 'Error al subir la imagen';
        } else {
            $destino = $uploadDir . basename($file['name']);
            if (move_uploaded_file($file['tmp_name'], $destino)) {
                $imagenHeader = 'Imagen subida:';
                $imagenPath = $destino;
            } else {
                $imagenHeader = 'No se subió ninguna imagen.';
                $imagenPath = $calaveraPath;
                $errorMensaje = 'Error al subir la imagen';
            }
        }
    } else {
        // Simplemente no se indicó ninguna imagen (sin error)
        $imagenHeader = 'No se subió ninguna imagen.';
        $imagenPath = $calaveraPath;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos del Jugador</title>
    <style>
        body {
            background-color: #e2e8f0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background-color: #ffff55;
            border-radius: 15px;
            padding: 35px;
            width: 520px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        h1 {
            text-align: center;
            font-size: 26px;
            margin-top: 0;
            margin-bottom: 25px;
        }
        .content {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .info {
            flex: 1;
            font-size: 16px;
            line-height: 1.6;
        }
        .info p {
            margin: 12px 0;
        }
        .image-box {
            width: 200px;
            text-align: center;
        }
        .image-box p.header-text {
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 12px;
            font-size: 16px;
        }
        .img-frame {
            border: 1px solid #0000ff;
            width: 180px;
            height: 180px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
        }
        .img-frame img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        .error-txt {
            margin-top: 15px;
            font-size: 15px;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Datos del Jugador</h1>
        <div class="content">
            <div class="info">
                <p><strong>Nombre:</strong> <?= $nombre ?></p>
                <p><strong>Alias:</strong> <?= $alias ?></p>
                <p><strong>Edad:</strong> <?= $edad ?></p>
                <p><strong>Armas seleccionadas:</strong> <?= $armas ?></p>
                <p><strong>¿Practica artes mágicas?:</strong> <?= $magia ?></p>
            </div>
            <div class="image-box">
                <p class="header-text"><?= $imagenHeader ?></p>
                <div class="img-frame">
                    <img src="<?= $imagenPath ?>" alt="Imagen de resultado">
                </div>
                <?php if (!empty($errorMensaje)): ?>
                    <p class="error-txt"><?= $errorMensaje ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
?>