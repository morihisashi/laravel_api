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
use Illuminate\Support\Facades\Log;

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
        $data = '';
        if(!empty($request->input('name'))){
            $name = $request->input('name');
            // modelを呼び出す
            $gbiz = new Gbiz();
            $res = $gbiz->getApi($name);
            // 不要な部分を削除し、JSON部分のみを抽出
            $jsonString = substr($res, strpos($res, '{'));

            // gbiz_searchへ取得結果を保存する
            $result = $gbiz->insertApiData($name, $jsonString);
            if($result){
                Log::info('gbiz_searchへのinsertが完了しました。');
            }
            // JSON文字列をPHPの配列に変換
            $data = json_decode($jsonString, true);
            return view('gbiz.index')->with('data', $data);
        }

        // アサイン
        return view('gbiz.index')->with('data', $data);
    }

    // 検索結果の一覧表示
    public function list(Request $request): View
    {
        // modelを呼び出す
        $gbiz = new Gbiz();
        $list = $gbiz->getData();

        if(count($list) === 0){
            $list = '';
        }

        // アサイン
        return view('gbiz.list')->with('list', $list);
    }

    // 検索結果の詳細表示
    public function detail(Request $request): View
    {
        $detail = '';
        $detail = $request->input('result');
        // JSON文字列をPHPの配列に変換
        $detail = json_decode($detail, true);
        // アサイン
        return view('gbiz.detail')->with('detail', $detail["hojin-infos"]);
    }

}
