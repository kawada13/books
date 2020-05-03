@extends('layouts.app')

@section('content')

    <h1>漫画追加</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($comic, ['route' => ['comics.store', $folder_id]]) !!}
        
                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                
                
                <div class="form-group">
                   {!! Form::hidden('user_id', Auth::user()->id) !!}
                </div>
                
                {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection
