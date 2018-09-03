<?php

namespace App\Http\Controllers;

use App\{
    Categories, Product
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
     * 获取商品筛选分类
     * @return \Illuminate\Http\JsonResponse
     */
    public function selectCategories()
    {
        $result = Categories::search( '*' )
            ->select( [ 'id', 'name' ] )
            ->take( 1000 )
            ->get();

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

        $products = Product::search( $request->text )
                    ->rule(\App\Es\Rule\ProductMultiMatchRule::class)
                    ->paginateRaw();
        $result=$products->toArray();

        $result['data']=$products->esFormat();

        return response()->json( [
            'data' => $result
        ], 200 );
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function productPrefix(Request $request)
    {
        $result = Product::search( $request->text )
            ->select( [ 'name' ] )
            ->rule( \App\Es\Rule\MatchPhrasePrefixRule::class )->get();

        return response()->json( [
            'data' => $result
        ], 200 );
    }
}
