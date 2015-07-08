<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Category; 
use CodeCommerce\Product; 

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Category $category, Product $product)
    {
        $categories = $category->all();

        $pFeatured = $product->featured()->get();

        $pRecommended = $product->recommended()->get();
        
        return view('store.index', compact('categories', 'pFeatured', 'pRecommended'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);

        $products = Product::ofCategory($id)->get();

        return view('store.category', compact('categories', 'category', 'products'));

    }

}
