<?php

namespace App\Http\Controllers;

use App\{
    Categories, Product, Shop
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Traits\EsFormatTrait;

class SearchController extends Controller
{
    use EsFormatTrait;

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
            ->rule( \App\Es\Rule\ProductMultiMatchRule::class )
            ->paginateRaw();
        $result = $products->toArray();

        $result[ 'data' ] = $products->esFormat();

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

    /**
     * nearby shops
     * @param Request $request
     * @return array
     */
    public function nearbyShops(Request $request)
    {
        [ $lat, $lon ] = explode( ',', $request->position );
        $result = Shop::searchRaw( [
            /*'from'        => 1,
            'size'        => 2,*/
            "sort"        => [
                "_geo_distance" => [
                    "location" => [
                        "lat" => $lat,
                        "lon" => $lon
                    ],
                    "order"    => $request->sort,
                    "unit"     => "km"
                ]
            ],
            "post_filter" => [
                "geo_distance" => [
                    "distance" => $request->distance,
                    "unit"     => "km",
                    "location" => [
                        "lat" => $lat,
                        "lon" => $lon
                    ]
                ]
            ]
        ] );

        return response()->json( [
            'data' => $this->formatDistanceShops( $result )
        ], 200 );
    }

    protected function formatDistanceShops(array $params)
    {
        return $this->esFormatData( $params, function (&$record, $value) {
            $record[ 'distance' ] = isset( $value[ 'sort' ][ 0 ] ) ? sprintf( "%.1f", $value[ 'sort' ][ 0 ] ) . "公里" : "";
        } );
    }
}
