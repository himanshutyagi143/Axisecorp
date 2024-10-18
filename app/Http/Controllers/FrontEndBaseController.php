<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;

class FrontEndBaseController extends BaseController
{

    public $data = [];

    public function __construct(){

        $categories = DB::table('parent_categories')->get();

        foreach ($categories as $category) {
            $subcategories = DB::table('sub_categories')
                ->where('parent', $category->name)
                ->get();

            $category->subcategories = $subcategories;
        }

        $featured = DB::table('products')->where('featured', '1')->where('status', 'Active')->orderBy(DB::raw('RAND()'))->limit(3)->get();
        foreach ($featured as $feature) {
            $feature_images = DB::table('product_images')
                ->where('product_id', $feature->id)
                ->get();

            $feature->images = $feature_images;
        }


        $this->data['system'] = DB::table('system')->first();
        $this->data['categories'] = $categories;
        $this->data['seo'] = DB::table('seo')->first();
        $this->data['featured'] = $featured;




    }
}
