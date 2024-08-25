<?php

namespace App\Models;
require '../vendor/autoload.php';

use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Gbiz extends Model
{
    use HasFactory;

    // 検索した企業名でAPIを叩き、情報を取得する
    public function getApi($name){
        try {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
            $dotenv->load();
        } catch (InvalidPathException $e) {
            echo 'Error loading .env file: ',  $e->getMessage();
            exit;
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

    // 取得した結果をデータベースに保存する
    public function insertApiData($name, $jsonString){
        if($name != ''){
            try {
                DB::table('gbiz_search')->insert([
                    'companyname' => $name,
                    'res' => true,
                    'result' => $jsonString,
                    'datecrt' => NOW(),
                ]);
                Log::info('gbiz_searchにinsertを開始しました。');
                return true;
            } catch (InvalidPathException $e) {
                echo 'Error insert gbiz_search : ',  $e->getMessage();
                exit;
            }
        }else{
            return false;
        }
    }
}
