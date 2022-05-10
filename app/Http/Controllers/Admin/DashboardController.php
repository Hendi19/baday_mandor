<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
class DashboardController extends Controller
{
    public function index(){
        Session::put('title','Dashboard');
        return view('admin/content/dashboard');
    }
}
