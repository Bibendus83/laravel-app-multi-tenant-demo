<?php

namespace App\Http\Controllers;

use App\Jobs\TestMultiTenantJob;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        TestMultiTenantJob::dispatch(app(\Hyn\Tenancy\Environment::class)->website()->id);

        return view('test');
    }
}
