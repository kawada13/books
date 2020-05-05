@extends('layouts.app')

@section('content')

{!! Form::open(['route' => ['serch.serch', $folder_id]]) !!}

　<div class="form-group">
  {!! Form::label('keyword', '検索ワード') !!}
  {!! Form::text('keyword') !!}
  </div>
  
  <div class="form-group">
  {!! Form::label('hits', '検索ヒット数') !!}
  {!! Form::select('hits', ['10' => '10', '20' => '20', '30' => '30'], '10') !!}
  </div>
  
  <div class="form-group">
    {!! Form::hidden('folder_id', $folder_id) !!}
  </div>
  
  {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}


@if ($response ? $response->hits > 0 : false)
<table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">タイトル</th>
            <th scope="col">出版社</th>
          </tr>
        </thead>
        <tbody>
        @foreach($response->Items as $item)
          <tr>
             <td>{{ $item->Item->title }}</td>
             <td>{{ $item->Item->publisherName }}</td>
             <td>
                 {!! Form::open(['route' => ['comics.store', $folder_id]]) !!}
                 　 {!! Form::hidden('folder_id', $folder_id) !!}
                 　 {!! Form::hidden('title', $item->Item->title) !!}
                 　 {!! Form::hidden('user_id', Auth::user()->id) !!}
                    {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}
                 {!! Form::close() !!}
             </td>
          </tr>
        </tbody>
        @endforeach
        </table>

@endif



@endsection