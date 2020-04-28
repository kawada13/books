<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Folder;

use App\Http\Requests\CreateFolder;

class FoldersController extends Controller
{
    public function create()
    {
        $folder = new Folder;

        return view('folders.create', [
            'folder' => $folder,
        ]);
        
    }
    
    
    public function store(CreateFolder $request)
    {
        
      $folder = new Folder;
      $folder->genre = $request->genre;
      $folder->save();

    return redirect()->route('comics.index', [
        'id' => $folder->id,
    ]);

        
    }
}
