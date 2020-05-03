@extends('layouts.app')

@section('content')

    <h1>漫画編集</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($comic, ['route' => ['comics.update', $comic->folder_id, $comic->id], 'method' => 'put']) !!}
        
                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                   <select name="status" id="status" class="form-control">
                       @foreach(\App\Comic::STATUS as $key => $val)
                       <option value="{{ $key }}"{{ $key == old('status', $comic->status) ? 'selected' : '' }}>{{ $val['label'] }}</option>
  　　　　　　　　　　　　　　　　　　　@endforeach
                   </select>
                </div>
                
                <div class="form-group">
                   {!! Form::hidden('user_id', Auth::user()->id) !!}
                </div>
                
                {!! Form::submit('編集', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection
