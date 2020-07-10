<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories = DB::table('categories')->get();
        $subcategories = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*', 'categories.name as cname')
            ->get();

        return view('admin.subcategory.subcategory', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'category_id' => 'required',
            'subcategory' => 'required',
        ]);

        DB::table('subcategories')->insert([
            'name' => $request->subcategory,
            'category_id' => $request->category_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $notification = array(
            'message' => 'New subcategory added successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        DB::table('subcategories')
            ->where('id', $id)
            ->delete();

        $notification = array(
            'message' => 'Category successfully deleted!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }

    public function edit($id)
    {
        $subcategory = DB::table('subcategories')
            ->where('id', $id)
            ->first();

        $categories = DB::table('categories')
            ->get();

        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
        ]);

        $updated = DB::table('subcategories')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
            ]);

        $notification = array(
            'message' => 'Category successfully updated!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.subcategory.index')->with($notification);
    }
}
