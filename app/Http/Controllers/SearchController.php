<?php

namespace App\Http\Controllers;

use App\{
    Categories, Product
};
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * 分类名称检索
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function nameSearchCategories(Request $request)
    {
        $result = Categories::search( $request->text )->get();

        return response()->json( [
            'data' => $result
        ], 200 );
    }

    /**
     * 商品名称和商品分类id检索
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function nameSearchProducts(Request $request)
    {
        $result = Product::search( $request->text )->get();

        //第一种方式获取高亮
        $result->transform( function ($product) {
            $product->highlighted = $product->highlight->name[ 0 ];

            return $product;
        } );

        return response()->json( [
            'data' => $result
        ], 200 );
    }

    public function productPrefix(Request $request)
    {
        $result = Product::search( $request->text )->get();
    }
}
