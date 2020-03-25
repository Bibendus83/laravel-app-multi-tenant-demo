@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Test qcod/laravel-app-settings</div>

                <div class="card-body">
                    Your app name set in config is <b>{{ setting('app_name') }}</b>
                    <br/>
                    The admin user email is <b>{{ $adminUser->email }}</b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

