<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function FooterSetup()
    {
        $all_footer= Footer::find(1);
        return view('admin.footer.all_footer',compact('all_footer'));
    }

    public function UpdateFooter(Request $request)
    {
        $footer_id = $request->id;
        Footer::findOrFail($footer_id)->update([
            'number' => $request->number,
            'short_description' => $request->short_description,
            'address' => $request->address,
            'email'=>$request->email,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'copyright'=>$request->copyright,
        ]);
        return redirect()->back()->with('info', 'Footer Updated Successfully');
    }
}
