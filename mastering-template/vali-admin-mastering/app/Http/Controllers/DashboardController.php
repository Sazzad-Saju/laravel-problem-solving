<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard.dashboard');
    }
    public function basicTable(){
        return view('admin.table.basic_table');
    }
    public function dataTable(){
        return view('admin.table.data_table');
    }
    public function charts(){
        return view('admin.charts.charts');
    }
}
