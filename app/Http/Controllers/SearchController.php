<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchUsers(Request $request)
    {
        $data = User::select("name")
            ->where("name","LIKE","%{$request->input('query')}%")
            ->get();

        return response()->json($data);
    }
}
