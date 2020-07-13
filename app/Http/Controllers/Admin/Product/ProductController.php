<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.name as cname', 'brands.name as bname')
            ->get();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();

        return view('admin.product.create', compact('categories', 'brands'));
    }

    public function getSubCategories($id)
    {
        $subcategories = DB::table('subcategories')->where('category_id', $id)->get();
        return json_encode($subcategories);
    }

    /**
     * Make the specified resource active or inactive.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id) {
        $status = DB::table('products')->where('id', $id)->value('status');

        if($status == 1) {
            DB::table('products')->where('id', $id)->update([
                'status' => 0
            ]);
        } else {
            DB::table('products')->where('id', $id)->update([
                'status' => 1
            ]);
        }
    

        $notification = array(
            'message' => 'Product status successfully updated!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image_one' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'image_two' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'image_three' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = array();

        $data['name'] = $request->name;
        $data['code'] = $request->code;
        $data['quantity'] = $request->quantity;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['description'] = $request->description;
        $data['color'] = $request->color;
        $data['size'] = $request->size;
        $data['price'] = $request->price;
        $data['discount_price'] = $request->discount_price;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['trending'] = $request->trending;
        $data['buyone_getone'] = $request->buyone_getone;
        $data['status'] = 1;
        $data['created_at'] = now();

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        if ($image_one && $image_two && $image_three) {
            $img1 = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300, 300)->save('media/products/' . $img1);
            $data['image_one'] = "media/products/" . $img1;

            $img2 = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300, 300)->save('media/products/' . $img2);
            $data['image_two'] = "media/products/" . $img2;

            $img3 = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300, 300)->save('media/products/' . $img3);
            $data['image_three'] = "media/products/" . $img3;
        }

        $product = DB::table('products')->insert($data);

        $notification = array(
            'message' => 'Product inserted successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.name as cname', 'subcategories.name as sname', 'brands.name as bname')
            ->where('products.id', $id)
            ->first();

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        $image1 = $product->image_one;
        $image2 = $product->image_two;
        $image3 = $product->image_three;

        File::delete([$image1, $image2, $image3]);

        DB::table('products')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Product deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
