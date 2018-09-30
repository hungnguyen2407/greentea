@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">Post</div>
                    @guest
                        <div class="card-body">
                            Welcome, You need to login to use the site.
                        </div>
                    @else
                        <div class="card-body">
                            {!! Form::open(['method'=>'POST', 'action' => 'PostController@store', 'files' => true]) !!}
                            <div class="form-group">
                                {!! Form::hidden('user_id', auth()->user()->id) !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '5']) !!}
                                {!! Form::file('file', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}
                                {!! Form::reset('Reset', ['class'=>'btn']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    @endguest
                </div>
            </div>
        </div>
        @guest
        @else
            @foreach(auth()->user()->posts as $post)
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-header">{{$post->user->name}}</div>

                            <div class="card-body">
                                <h4><strong>{{$post->title}}</strong></h4>
                                <p>{{$post->content}}</p>
                                <a href="/file/{{$post->file}}"><strong>{{$post->file}}</strong></a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        @endguest
    </div>
@endsection
