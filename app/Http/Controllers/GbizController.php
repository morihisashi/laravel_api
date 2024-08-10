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

    public function index(Request $request): RedirectResponse|View
    {
        $corporate = '';

        return view('gbiz.index')->with('corporate', $corporate);
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
            return view('gbiz.index')->with('res', $res);
        }

        // リダイレクト
        return view('gbiz.index')->with('corporate', $corporate);
    }

}
