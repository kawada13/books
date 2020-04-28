@extends('layouts.app')

@section('content')
<div class="row">
  
   <div class="col col-md-4">
     <ol class="breadcrumb">
        <li class="active">ジャンル</li>
     </ol>
     
     {!! link_to_route('signup.get', 'ジャンルを追加', [], ['class' => 'btn btn-outline-secondary btn-block']) !!}
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
      {!! link_to_route('signup.get', '漫画を追加', [], ['class' => 'btn btn-outline-secondary btn-block']) !!}
      
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
             <td><a href="#">編集</a></td>
          </tr>
        </tbody>
        @endforeach
      </table>
   </div>
</div>
 @endsection 