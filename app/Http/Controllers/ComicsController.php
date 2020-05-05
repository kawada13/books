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
        
         $current_folder = Folder::find($id);
         
         if (\Auth::id() === $current_folder->user_id) {
             
             $folders = \Auth::user()->folders()->get();
        
       
        
             $comics = $current_folder->comics()->get();

             return view('comics.index', [
            'folders' => $folders,
            'current_folder_id' => $id,
            'comics' => $comics,
            ]);
         }
         
         return back();
        
    }
    
    
    public function create($id)
    {
        $current_folder = Folder::find($id);
        $response = null;
        
        if (\Auth::id() === $current_folder->user_id) {
           return view('comics.create', [
            'folder_id' => $id,
            'response' => $response,
           ]);
        }
        
        return back();
    }
    
    
    public function store(int $id, CreateComic $request) 
    {
        
        
        $current_folder = Folder::find($id);
        
        if (\Auth::id() === $current_folder->user_id) {
        $comic = new Comic;
        $comic->title = $request->title;
        $comic->user_id = $request->user_id;
        
        $current_folder->comics()->save($comic);
        
        return redirect()->route('comics.index', [
            'id' => $current_folder->id,
            ]);
        }
        
        return back();
    }
    
    public function edit(int $id, int $comic_id)
   {
    $comic = Comic::find($comic_id);
    
    $current_folder = Folder::find($id);
    if (\Auth::id() === $current_folder->user_id) {
    

    return view('comics.edit', [
        'comic' => $comic,
    ]);
    
    }
    return back();
   }
   
   public function update(int $id, int $comic_id, UpdateComic $request)
  {
      
    
    $comic = Comic::find($comic_id);
    $current_folder = Folder::find($id);
    
     if (\Auth::id() === $current_folder->user_id) {
    
    $comic->title = $request->title;
    $comic->status = $request->status;
    $comic->save();

    
    return redirect()->route('comics.index', [
        'id' => $comic->folder_id,
    ]);
    }
     return back();
     
  }
  
  
    public function destroy(int $id, int $comic_id) {
        
        $comic = Comic::find($comic_id);
        
        $current_folder = Folder::find($id);
        
        $comic->delete();
        
        return redirect()->route('comics.index', [
        'id' => $comic->folder_id,
    ]);
    }
    
}
