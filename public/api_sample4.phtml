<?php
require '../vendor/autoload.php';

use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;

try {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
} catch (InvalidPathException $e) {
    echo 'Error loading .env file: ',  $e->getMessage();
    exit;
}
echo 'API_URL: ' . env('API_URL') . "\n";
echo 'API_TOKEN: ' . env('API_TOKEN') . "\n";
echo 'CORPORATE_NUMBER: ' . env('CORPORATE_NUMBER') . "\n";
echo 'PAGE: ' . env('PAGE') . "\n";
echo 'LIMIT: ' . env('LIMIT') . "\n";

$url = env('API_URL') . '?corporate_number=' . env('CORPORATE_NUMBER') . '&page=' . env('PAGE') . '&limit=' . env('LIMIT');
$headers = [
    "Content-Type: application/json",
    "X-hojinInfo-api-token: " . env('API_TOKEN'),
];

$ch = curl_init();

// オプション
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// URLの情報を取得する
$res = curl_exec($ch);
curl_close($ch);

var_dump($res);
?>