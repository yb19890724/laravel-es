<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $result = Product::search($request->text)->get();
        return response()->json([
            'data' => $result
        ], 200);
    }
}
