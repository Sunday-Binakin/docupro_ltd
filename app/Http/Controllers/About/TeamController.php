<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_all_team_members = Team::latest()->get();
        return view('admin.About.Team.index',compact('show_all_team_members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.About.Team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required',
            'portfolio' => 'required',
            'linkedin' => 'required',
            'about' => 'required',
            'member_image' => 'required',
        ], [
            'name.required' => 'Please fill the text editor',
            'portfolio.required' => 'Add the portfolio of team member',
            'linkedin.required' => 'Add a link to the person LinkedIn profile',
            'about.required' => 'Please fill the text editor with the bio',
            'member_image.required' => 'Please Add an image',
        ]);
        if ($request->hasFile('member_image')) {
            $file = $request->file('member_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/member_images/', $filename);
            Image::make(public_path('uploads/member_images/' . $filename))->fit(400, 400)->save();
        } else {
            $filename = 'default.png';
        }
        Team::insert([
            'name' => $request->name,
            'portfolio' => $request->portfolio,
            'linkedin' => $request->linkedin,
            'about' => $request->about,
            'member_image' => 'uploads/member_images/' . $filename,
            'created_at' => Carbon::now(),

        ]);

        alert()->success('Successfully Added')->persistent(true, false);

        return redirect()->route('team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $edit_team_member = Team::FindOrFail($id);
        return view('admin.About.Team.edit', compact('edit_team_member'));
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
        if ($request->hasFile('member_image')) {
            $file = $request->file('member_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/member_images/', $filename);
            Image::make(public_path('uploads/member_images/' . $filename))->fit(400, 400)->save();

            Team::FindOrFail($id)->update([
                'name' => $request->name,
                'portfolio' => $request->portfolio,
                'linkedin' => $request->linkedin,
                'about' => $request->about,
                'member_image' => 'uploads/member_images/' . $filename,
                'created_at' => Carbon::now(),

            ]);
            toast('Successfully Updated with Image ', 'success', 'top-right')->hideCloseButton();
        } else {

            Team::FindOrFail($id)->update([
                'name' => $request->name,
                'portfolio' => $request->portfolio,
                'linkedin' => $request->linkedin,
                'about' => $request->about,
                'created_at' => Carbon::now(),

            ]);
            toast('Form Updated without Image ', 'success', 'top-right')->hideCloseButton();
        }

        return redirect()->route('team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::FindOrFail($id)->delete();
        toast('Deleted', 'success', 'top-right')->hideCloseButton();
        return redirect()->route('team.index');
    }
}
