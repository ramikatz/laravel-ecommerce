<?php

namespace App\Http\Controllers\Dashboard\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productcategories = ProductCategory::all();
        $allMenus  = ProductCategory::where('parent_id', '=', 0)->with('subcategory')->get();
        return view('Backend.productCategory.index', compact('productcategories', 'allMenus'));
    }
    public function store(Request $request)
    {
        $slug = Str::slug($request->name, '-');
        $productcategory = new ProductCategory();
        if ($request->file('image')) {
            $image = $request->file('image');
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/productcategory'), $my_image);
            $productcategory->image = $my_image;
        }

        $productcategory->name = $request->name;
        $productcategory->discription = $request->discription;
        if ($request->parent_category_id) {
            $productcategory->parent_id = $request->parent_category_id;
        }
        $productcategory->slug = $slug;
        $productcategory->save();

        return redirect()->route('dashboard.category.index')
            ->with('success', 'User Created successfully');
    }

    public function edit(ProductCategory $productcategory)
    {
        $allMenus  = ProductCategory::where('parent_id', '=', 0)->with('subcategory')->get();
        return view('Backend.productCategory.edit', compact('productcategory', 'allMenus'));
    }

    public function update(Request $request, ProductCategory $productcategory)
    {
        $slug = Str::slug($request->name, '-');
        $productcategory->slug = $slug;
        if ($request->file('image')) {
            File::delete('upload/productcategory' . $productcategory->image);
            $image = $request->file('image');
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/productcategory'), $my_image);
            // dd($my_image);
            $productcategory->image = $my_image;
        }

        $productcategory->name = $request->name;
        $productcategory->discription = $request->discription;

        if ($request->parent_category_id == "null") {
            $productcategory->parent_id = 0;
        } else {
            $productcategory->parent_id = $request->parent_category_id;
        }


        $productcategory->save();

        return redirect()->route('dashboard.category.index')
            ->with('success', 'User Updated successfully');
    }

    public function destroy($productcategory)
    {

        $productcategory = ProductCategory::where('id', $productcategory)->first();


        if ($productcategory->image) {
            File::delete('upload/productcategory' . $productcategory->image);
        }

        $productcategory->delete();

        return redirect()->route('dashboard.category.index')
            ->with('success', 'Category Deleted Successfully');
    }
}
