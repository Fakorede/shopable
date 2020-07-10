<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $coupons = DB::table('coupons')->get();

        return view('admin.coupon.coupon', compact('coupons'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:coupons|max:255',
            'discount' => 'required',
        ]);

        DB::table('coupons')->insert([
            'code' => $request->code,
            'discount' => $request->discount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $notification = array(
            'message' => 'New coupon successfully added!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $coupon = DB::table('coupons')
            ->where('id', $id)
            ->first();

        return view('admin.coupon.edit', compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'code' => 'required|max:255',
            'discount' => 'required',
        ]);

        $updated = DB::table('coupons')
            ->where('id', $id)
            ->update([
                'code' => $request->code,
                'discount' => $request->discount,
            ]);

        $notification = array(
            'message' => 'Coupon successfully updated!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.coupon.index')->with($notification);
    }

    public function delete($id)
    {
        DB::table('coupons')
            ->where('id', $id)
            ->delete();

        $notification = array(
            'message' => 'Coupon successfully deleted!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }
}
