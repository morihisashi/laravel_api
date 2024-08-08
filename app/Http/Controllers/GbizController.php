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

class GbizController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request): RedirectResponse|View
    {
        // リクエストデータの処理
        $data = $request->all();

        // modelを呼び出す
        $gbiz = new Gbiz();
        $res = $gbiz->getApi($data);

        return view('gbiz.index')->with('res', $res);
    }

    public function redirect(Request $request): RedirectResponse
    {
        // リクエストデータの処理
        $data = $request->all();

        // modelを呼び出す
        $gbiz = new Gbiz();
        $res = $gbiz->getApi($data);

        // リダイレクト
        return redirect()->route('gbiz.index')->with('res', $res);
    }

}
