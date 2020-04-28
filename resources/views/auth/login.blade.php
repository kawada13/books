@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ログイン画面</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Emailアドレス']) !!}
                </div>

                <div class="form-group">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'パスワード']) !!}
                </div>

                {!! Form::submit('Log in', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}

            <p class="mt-2">未登録ならば {!! link_to_route('signup.get', 'こちらへ!') !!}</p>
        </div>
    </div>
@endsection
