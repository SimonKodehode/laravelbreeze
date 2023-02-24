<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\BlogPost;

class DashboardController extends Controller
{
  public function index()
{
    $user = auth()->user();
    $posts = $user->posts;

    return Inertia::render('Dashboard', ['posts' => $posts]);
}

}
