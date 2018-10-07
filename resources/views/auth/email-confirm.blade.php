@extends('layouts.app')
@section('title', 'Email Confirm')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        Your email address is successfully verify. Click <a href="{{route('login')}}">here</a> to login.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection