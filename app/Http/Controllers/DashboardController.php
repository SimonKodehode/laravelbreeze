<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\BlogPost;

class DashboardController extends Controller
{                       //Added request facade
  public function index(Request $request)
{

  
   //Get posts from user making the request
    $posts = $request->user()->post;

    return Inertia::render('Dashboard', ['posts' => $posts]);
}

}
