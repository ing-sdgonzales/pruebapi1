<?php

namespace App\Controllers;

use App\Core\ApiClient;

class CvController
{
    public function saveCV()
    {
        if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
            $token = $_SESSION['token'];
            $userUrl = $_SESSION['usuario']['url'];

            $file = $_FILES['cv'];
            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $fileSize = $file['size'];

            if ($fileExtension !== 'pdf') {
                echo "Error: El archivo debe ser un PDF.";
                return;
            }

            if ($fileSize > 5 * 1024 * 1024) { // 5 MB
                echo "Error: El archivo no debe exceder los 5 MB.";
                return;
            }

            $fileData = file_get_contents($file['tmp_name']);

            $api = new ApiClient();
            $response = $api->post('usuarios/' . $userUrl . '/cargar_cv', [
                'curriculum' => base64_encode($fileData)
            ], $token);

            if ($response['estado']) {
                echo "CV cargado con éxito.";
            } else {
                echo "Error: " . $response['message'];
            }
        } else {
            echo "Error: No se ha subido ningún archivo.";
        }
    }
}
