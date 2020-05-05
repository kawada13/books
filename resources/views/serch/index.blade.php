@extends('layouts.app')

@section('content')

{!! Form::open(['route' => 'serch.serch']) !!}

　<div class="form-group">
  {!! Form::label('keyword', '検索ワード') !!}
  {!! Form::text('keyword') !!}
  </div>
  
  <div class="form-group">
  {!! Form::label('hits', '検索ヒット数') !!}
  {!! Form::select('hits', ['10' => '10', '20' => '20', '30' => '30'], '10') !!}
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
             <td>{!! link_to_route('serch.index', '追加', [], ['class' => 'nav-link']) !!}</td>
          </tr>
        </tbody>
        @endforeach
        </table>

@endif


@endsection