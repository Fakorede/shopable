<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.brand', compact('brands'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:brands|max:255',
            'logo' => 'required|mimes:png,jpeg,jpg|max:20000',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $filePath = 'media/brands/';
            $fileUrl = $filePath . $fileName;
            $file->move($filePath, $fileName);

            DB::table('brands')->insert([
                'name' => $request->name,
                'logo' => $fileUrl,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $notification = array(
                'message' => 'New brand successfully added!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);

        } else {
            DB::table('brands')->insert([
                'name' => $request->name,
            ]);

            $notification = array(
                'message' => 'New brand successfully added!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }

    }

    public function delete(Request $request, $id)
    {
        $brand = DB::table('brands')
            ->where('id', $id)
            ->first();

        $image = $brand->logo;

        if ($image) {
            unlink($image);
        }

        DB::table('brands')
            ->where('id', $id)
            ->delete();

        $notification = array(
            'message' => 'Brand successfully deleted!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }

    public function edit(Request $request, $id)
    {
        $brand = DB::table('brands')
            ->where('id', $id)
            ->first();

        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {

        if ($request->hasFile('logo')) {
            unlink($request->old_logo);

            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $filePath = 'media/brands/';
            $fileUrl = $filePath . $fileName;
            $file->move($filePath, $fileName);

            DB::table('brands')->where('id', $id)->update([
                'name' => $request->name,
                'logo' => $fileUrl,
            ]);

            $notification = array(
                'message' => 'Brand successfully updated!',
                'alert-type' => 'success',
            );

            return redirect()->to('/admin/brands/')->with($notification);

        } else {
            DB::table('brands')->where('id', $id)->update([
                'name' => $request->name,
            ]);

            $notification = array(
                'message' => 'Brand successfully updated!',
                'alert-type' => 'success',
            );

            return redirect()->to('/admin/brands/')->with($notification);
        }

    }

}
