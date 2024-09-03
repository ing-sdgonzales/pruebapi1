<?php

namespace App\Core;

class ApiClient
{
    public function post($endpoint, $data, $token = null)
    {
        $url = API_BASE_URL . $endpoint;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            return ['status' => 'error', 'message' => curl_error($ch)];
        }

        curl_close($ch);

        return json_decode($response, true);
    }

    public function get($endpoint, $token)
    {
        $url = API_BASE_URL . $endpoint;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Token ' . $token
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $response = curl_exec($ch);

        if ($response === false) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            die("Error: $error_msg");
        }

        curl_close($ch);

        return json_decode($response, true);
    }
}
