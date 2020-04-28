<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Folder;

use App\Comic;

class ComicsController extends Controller
{
    public function index($id)
    {
        $folders = Folder::all();
        
        $current_folder = Folder::find($id);
        
        $comics = $current_folder->comics()->get();

        return view('comics.index', [
            'folders' => $folders,
            'current_folder_id' => $id,
            'comics' => $comics,
        ]);
    }
}
