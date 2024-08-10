<?php

namespace App\Models;
require '../vendor/autoload.php';

use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gbiz extends Model
{
    use HasFactory;

    public function getApi($coroporate, $name){
        try {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
            $dotenv->load();
        } catch (InvalidPathException $e) {
            echo 'Error loading .env file: ',  $e->getMessage();
            exit;
        }
        if(isset($coroporate)){
            $url = env('API_URL') . '?corporate_number=' . $coroporate . '&page=' . env('PAGE') . '&limit=' . env('LIMIT');
        }

        if(isset($name)){
            $encodedString = urlencode($name);
            $url = env('API_URL') . '?name=' . $encodedString . '&page=' . env('PAGE') . '&limit=' . env('LIMIT');
        }
        
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

        return $res;
    }
}
