<?php

namespace App\Http\Controllers\Admin\Newsletter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $newsletters = DB::table('newsletters')->get();

        return view('admin.newsletter.newsletter', compact('newsletters'));
    }

    public function delete($id)
    {
        DB::table('newsletters')
            ->where('id', $id)
            ->delete();

        $notification = array(
            'message' => "Subscriber successfully deleted!",
            'alert-type' => "success"
        );

        return redirect()->back()->with($notification);
    }


}
