@extends('layouts.app')

@section('content')
<div class="row">
  
   <div class="col col-md-4">
     <ol class="breadcrumb">
        <li class="active">ジャンル</li>
     </ol>
     
     {!! link_to_route('folders.create', 'ジャンルを追加', [], ['class' => 'btn btn-outline-secondary btn-block']) !!}
     <div class="list-group" style="max-width: 400px;">
    　@foreach($folders as $folder)
    　   <a
           href="{{ route('comics.index', ['id' => $folder->id]) }}"
           class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}"
        >
            {{ $folder->genre }}
         </a>
    　@endforeach
     </div>
    </div>
      
      

   <div class="column col-md-8">
      <ol class="breadcrumb">
        <li class="active">漫画</li>
      </ol>
      {!! link_to_route('comics.create', '漫画を追加', ['id' => $current_folder_id], ['class' => 'btn btn-outline-secondary btn-block']) !!}
      
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">タイトル</th>
            <th scope="col">状況</th>
          </tr>
        </thead>
        <tbody>
        @foreach($comics as $comic)
          <tr>
             <td>{{ $comic->title }}</td>
             <td><span class="label {{ $comic->status_class }}">{{ $comic->status_label }}</span></td>
             <td>{!! link_to_route('comics.update', '編集', ['id' => $comic->folder_id, 'comic_id' => $comic->id]) !!}</td>
             <td>
                 {!! Form::model($comic, ['route' => ['comics.destroy', $comic->folder_id, $comic->id], 'method' => 'delete']) !!}
                 {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                 {!! Form::close() !!}
                 </td>
          </tr>
        </tbody>
        @endforeach
      </table>
   </div>
</div>
@endsection