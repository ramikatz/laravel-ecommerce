<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::withTrashed()->where('id', 1)->get();
        // $products = Product::onlyTrashed()->where('airline_id', 1)->get();
        $products = Product::with('productcategories')->paginate(10);
        return view('Backend.Product.index', compact('products'));
    }

    public function create()
    {
        //$productcategories = ProductCategory::all();
        $productcategories  = ProductCategory::where('parent_id', '=', 0)->with('subcategory')->get();
        return view('Backend.Product.create', compact('productcategories'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $slug = Str::slug($request->product_title, '-');
        $product = new Product();
        if ($request->file('image')) {
            $image = $request->file('image');
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/product'), $my_image);
            $product->image = $my_image;
        }
        $product->product_title = $request->product_title;
        $product->product_sub = $request->product_sub;
        $product->content = $request->content;
        $product->purchase_price = $request->purchase_price;
        $product->keywords = $request->keywords;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;
        $product->meta = $request->meta;

        if ($request->slug) {
            $product->slug = $request->slug;
        } else {
            $product->slug = $slug;
        }

        $product->save();

        if ($request->file('images')) {
            $images = $request->file('images');




            //dd($count);
            foreach ($images as $image) {

                $my_image = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/product'), $my_image);
                $product->image = $my_image;

                $productimage = new ProductImage();
                $productimage->images = $my_image;
                $product->productimages()->save($productimage);
            }
        }

        $productcategory = new ProductCategory();
        $productcategory = $request->productcategory_id;
        $product->productcategories()->sync($productcategory);

        return redirect()->route('dashboard.product.index')
            ->with('success', 'Product Created successfully');
    }

    public function edit($product)
    {
        //dd($product);
        $product = Product::where('id', $product)->with('productcategories')->first();
        //dd($product);
        //dd($product->productcategories->first()->pivot);

        // seratama product with categories
        //$product = Product::find($product)->with('productcategory')->first();

        // parent category only 

        $productcategories  = ProductCategory::where('parent_id', '=', 0)->with('subcategory')->get();


        return view('Backend.Product.edit', compact('product', 'productcategories'));
    }

    public function update(Request $request, Product $product)
    {
        //dd($request);
        $slug = Str::slug($request->name, '-');

        if ($request->file('image')) {
            $image = $request->file('image');
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/product'), $my_image);
            //dd($image);
            $product->image = $my_image;
        }
        $product->product_title = $request->product_title;
        $product->product_sub = $request->product_sub;

        $product->content = $request->content;
        $product->description = $request->description;
        $product->sdescription = $request->sdescription;

        $product->keywords = $request->keywords;
        $product->regular_price = $request->regular_price;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;

        if ($request->slug) {
            $product->slug = $request->slug;
        } else {
            $product->slug = $slug;
        }
        $product->meta = $request->meta;

        if ($request->file('images')) {
            $images = $request->file('images');
            // dd($product->id);
            $delproductimages = ProductImage::where('product_id', $product->id)->get();
            //dd($productimages);

            foreach ($delproductimages as $delproductimage) {

                File::delete('upload/product' . $delproductimage->image);
                $delproductimage->delete();
            }
            //dd($images);
            foreach ($images as $image) {

                $my_image = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/product'), $my_image);
                //$product->image = $my_image;
                $productimage = new ProductImage();
                $productimage->images = $my_image;
                $product->productimages()->save($productimage);
            }
        }
        $product->save();

        //$productcategory = new ProductCategory();
        $productcategory = $request->productcategory_id;
        $product->productcategories()->sync($productcategory);

        return redirect()->route('dashboard.product.index')
            ->with('success', 'Product Created successfully');
    }

    //public function destroy(Product $product)
    public function destroy($product)
    {
        // dd($product);
        $product = Product::find($product);
        if (Gate::denies('super-user')) {
            return redirect(route('dashboard.user.index'))
                ->with('message', 'You have no permission to delete users');
        }
        //Product::withTrashed()->where('airline_id', 1)->restore();

        if (($product->image)) {
            File::delete('upload/product' . $product->image);
        }
        //$product->productcategory()->detach();
        $product->delete();

        return redirect()->route('dashboard.product.index')
            ->with('message', 'product Deleted Successfully');
    }
}

    /*  return response()->json(['status' => 'service deleted sucessfully']); */
