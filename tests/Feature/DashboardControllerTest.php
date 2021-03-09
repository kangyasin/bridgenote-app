<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserPosition;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    public function testHomeView()
    {
        $breadcrumbs = [
            ['link'=>"home",'name'=>"Home"], ['name'=>"Index"]
        ];
        $users = User::with('position')->paginate(5);
        $view = $this
            ->view('/content/home', ['breadcrumbs' => $breadcrumbs, 'users' => $users] );;

        $view->assertSee('Index');
    }
}
