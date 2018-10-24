@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (Auth::user())
                        <div class="alert alert-success">
                            Welcome {{ Auth::user()->name }}
                            You are logged in!
                        </div>

                    @endif
                    {{ session('id') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
