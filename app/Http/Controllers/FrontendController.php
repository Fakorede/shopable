<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function storeNewsletter(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:newsletters'
        ]);

        DB::table('newsletters')->insert([
            'email' => $request->email
        ]);

        $notification = array(
            'message' => 'Thanks for subscribing to our newsletter!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
