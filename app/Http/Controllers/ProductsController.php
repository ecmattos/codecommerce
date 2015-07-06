<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Category; 

class ProductsController extends Controller
{
    private $productModel;
    
    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $products = $this->productModel->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
     public function store(Requests\ProductRequest $request)
    {
        $input = $request->all();
        $product = $this->productModel->fill($input);
        $product->save();

        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');
        $product = $this->productModel->find($id);

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    
    public function update(Requests\ProductRequest $request, $id)
    {
        $input = $request->all();
        $product = $this->productModel->find($id);
        $product->update($input);

        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->productModel->find($id)->delete();

        return redirect()->route('products');
    }

    public function images($id)
    {
        $product = $this->productModel->find($id);

        return view('products.images', compact('product'));
    }

    public function create_image($id)
    {
        $product = $this->productModel->find($id);

        return view('products.create_image', compact('product'));
    }

    public function store_image(Requests\ProductImageRequest $request, $id, ProductImage $productimage)
    {
        $file = $request->file('image');
        
        $extension = $file->getClientOriginalExtension();

        $image = $productimage::create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('local_public')->put($image->id.'.'.$extension, File::get($file));
        
        return redirect()->route('products.images', ['id' => $id]);
    }

    public function destroy_image($id, ProductImage $productimage)
    {
        $image = $productimage->find($id);

        if(file_exists(public_path().'/uploads'.$image->id.'.'.$image->extension))
            {       
                Storage::disk('local_public')->delete($image->id.'.'.$image->extension);
            }
            
        $product = $image->product;

        $image->delete();

        return redirect()->route('products.images', ['id' => $product->id]);
    }
}
