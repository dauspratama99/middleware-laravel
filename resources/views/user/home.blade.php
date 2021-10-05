@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard {{ $user->user_name }}</div>
 
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    <p><strong>Selamat datang {{ $user->user_name }}!</strong> Anda telah melakukan login sebagai {{ $user->user_status }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection