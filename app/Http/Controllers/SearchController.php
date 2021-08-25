<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        return redirect()->route('shop', [
            'search'        =>  $request->search,
            'categoryId'    =>  $request->categoryId
        ]);
    }
}
