<?php

class PythonApiService
{
    private $url = "http://127.0.0.1:5000/preprocess";

    public function send($data)
    {
        $ch = curl_init($this->url);

        $payload = json_encode([
            "data" => $data
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}