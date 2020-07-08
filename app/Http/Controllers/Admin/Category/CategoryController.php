<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.category', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories|max:255',
        ]);

        // Category::create($request->all());

        DB::table('categories')->insert([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $notification = array(
            'message' => 'New category successfully added!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function edit(Request $request, $id)
    {
        $category = DB::table('categories')
            ->where('id', $id)
            ->first();

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $updated = DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'updated_at' => now(),
            ]);

        if ($updated) {

            $notification = array(
                'message' => 'Category successfully updated!',
                'alert-type' => 'success',
            );

            return redirect()->route('admin.category.index')->with($notification);
        } else {

            $notification = array(
                'message' => 'Nothing to update!',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);

        }
    }

    public function delete($id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->delete();

        $notification = array(
            'message' => 'Category successfully deleted!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }
}
