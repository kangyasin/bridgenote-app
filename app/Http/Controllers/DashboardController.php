<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // home
    public function index() {
        $breadcrumbs = [
            ['link'=>"home",'name'=>"Home"], ['name'=>"Index"]
        ];
        $users = User::with('position')->paginate(2);
        return view('/content/home', ['breadcrumbs' => $breadcrumbs, 'users' => $users] );
    }
}
