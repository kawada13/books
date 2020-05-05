<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Folder;

class SerchController extends Controller
{
    
    public function index($id) {
        
        $response = null;
        $current_folder = Folder::find($id);
        
        return view('serch.index', [
            'response' => $response,
        ]);
    }
    
    
    
    
    public function serch(Request $request) {
       
       
    //   dd($request);
        
    $keyword = '';
    $response = null;
    $folder_id = $request->folder_id;

    $url = 'https://app.rakuten.co.jp/services/api/BooksTotal/Search/20170404';
    
    // applicationIdの 'xxxxx....' は取得したアプリIDに書き換える
    $params = [
        'format' => 'json',
        'keyword' => $request->get('keyword'),
        'hits' => $request->get('hits'),
        'applicationId' => '1084521773457364307',
    ];
  
    

    // 検索する！のボタンが押された場合の処理
    if ($request->get('keyword')) {
        $keyword = $request->get('keyword');
        $response_json = $this->execute_api($url, $params, $keyword);
        $response = json_decode($response_json);  // JSONデータをオブジェクトにする
    }
    
    //   dd($response);
       
       return view('comics.create', [
            'response' => $response,
            'folder_id' => $folder_id
        ]);
    
    
    
    }
    
    // Web APIを実行する
    protected function execute_api($url, $params, $keyword) {
        $query = http_build_query($params, "", "&");
        $search_url = $url . '?' . $query;
        // dd($search_url);
        return file_get_contents($search_url);
    }
    
    
    
    
    
    
       

}
