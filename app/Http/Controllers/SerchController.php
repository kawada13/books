<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SerchController extends Controller
{
    
    public function index(Request $request) {
        
    $keyword = '';
    $response = null;

    $url = 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404';
    
    // applicationIdの 'xxxxx....' は取得したアプリIDに書き換える
    $params = [
        'format' => 'json',
        'applicationId' => '1084521773457364307',
        'hits' => $request->get('hits'),
        'imageFlag' => 1
    ];

    // 検索する！のボタンが押された場合の処理
    if ($request->get('keyword')) {
        $keyword = $request->get('keyword');
        $response_json = execute_api($url, $params, $keyword);
        $response = json_decode($response_json);  // JSONデータをオブジェクトにする
    }
        
    }
    
    
    // Web APIを実行する
    function execute_api($url, $params, $keyword) {
        $query = http_build_query($params, "", "&");
        $search_url = $url . '?' . $query . '&keyword=' . $keyword;
        
        return file_get_contents($search_url);
    }
    
     
    ]);

}
