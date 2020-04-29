<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Folder;

use App\Comic;

use App\Http\Requests\CreateComic;

use App\Http\Requests\UpdateComic;

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
    
    public function edit(int $id, int $comic_id)
   {
    $comic = Comic::find($comic_id);

    return view('comics.edit', [
        'comic' => $comic,
    ]);
   }
   
   public function update(int $id, int $comic_id, UpdateComic $request)
  {
      
    
    $comic = Comic::find($comic_id);

    
    $comic->title = $request->title;
    $comic->status = $request->status;
    $comic->comment = $request->comment;
    $comic->save();

    
    return redirect()->route('comics.index', [
        'id' => $comic->folder_id,
    ]);
  }
    
}
