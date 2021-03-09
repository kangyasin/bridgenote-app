<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    // home
    public function index() {
        $breadcrumbs = [
            ['link'=>"home",'name'=>"Home"], ['name'=>"Index"]
        ];
        $users = User::with('position')->paginate(5);
        return view('/content/home', ['breadcrumbs' => $breadcrumbs, 'users' => $users] );
    }
}
