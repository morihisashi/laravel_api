<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Gbiz;

use function PHPUnit\Framework\isNull;

class GbizController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(): View
    {
        $data = '';

        return view('gbiz.index')->with('data', $data);
    }

    public function redirect(Request $request): View
    {
        // リクエストデータの処理
        $corporate = '';
        if(!empty($request->input('corporate_number')) or !empty($request->input('name'))){
            $corporate = $request->input('corporate_number');
            $name = $request->input('name');
            // modelを呼び出す
            $gbiz = new Gbiz();
            $res = $gbiz->getApi($corporate,$name);
            // 不要な部分を削除し、JSON部分のみを抽出
            $jsonString = substr($res, strpos($res, '{'));
            // JSON文字列をPHPの配列に変換
            $data = json_decode($jsonString, true);
            return view('gbiz.index')->with('data', $data);
        }

        // リダイレクト
        return view('gbiz.index')->with('corporate', $corporate);
    }

}
