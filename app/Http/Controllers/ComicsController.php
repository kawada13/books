<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Folder;

use App\Comic;

use App\Http\Requests\CreateComic;

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
    
    
    public function create($id)
    {
        $comic = new Comic;
        
       return view('comics.create', [
        'folder_id' => $id,
        'comic' => $comic
       ]);
    }
    
    
    public function store(int $id, CreateComic $request) 
    {
        
        $current_folder = Folder::find($id);
        $comic = new Comic;
        $comic->title = $request->title;
        $comic->comment = $request->comment;
        $comic->user_id = $request->user_id;
        
        $current_folder->comics()->save($comic);
        
        return redirect()->route('comics.index', [
            'id' => $current_folder->id,
            ]);
    }
    
}
