@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Test Page</div>

                <div class="card-body">
                    Created TestMultiTenantJob, run `php artisan queue:listen` to init the queue worker
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
