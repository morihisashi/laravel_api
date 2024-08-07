<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GbizController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request): RedirectResponse|View
    {
        // 例えば、特定の条件に基づいてリダイレクトを行う
        if ($request->input('redirect') === 'true') {
            return redirect('redirect')->with('status', 'Redirected successfully!');
        }

        // その他の処理
        return view('gbiz.index');
    }

    public function redirect(Request $request): RedirectResponse
    {
        // リクエストデータの処理
        $data = $request->all();

        // データを処理するロジックを追加

        // リダイレクト
        return redirect()->route('gbiz.index')->with('status', 'Data processed successfully!');
    }

}
