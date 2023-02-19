<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getData()
{
    $data = DB::table('posts')->get();
    return response()->json($data);
}

}
