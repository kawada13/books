<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Folder;

class FoldersController extends Controller
{
    public function create()
    {
        $folder = new Folder;

        return view('folders.create', [
            'folder' => $folder,
        ]);
        
    }
    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'genre' => 'required|max:191',
        ]);

        
      $folder = new Folder;
      $folder->genre = $request->genre;
      $folder->save();

    return redirect()->route('comics.index', [
        'id' => $folder->id,
    ]);

        
    }
}
