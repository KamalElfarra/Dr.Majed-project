<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setting;

class settingcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view()
    {
        return view('setting.index')->with('firsts',setting::first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name'=>'required',
            'title'=>'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        //dd($request);
        $photo=request()->photo;
        $photo_name=time().".". $photo->getClientOriginalExtension();
        $photo->move(public_path('uploads'), $photo_name);
       // $path = $request->photo->storeAs('uploads', $photo_name);

        $setting=setting::first();

        $setting->name=$request->name;
        $setting->title=$request->title;
        $setting->photo="uploads/" . $photo_name;

        $setting->save();
        return redirect()->back();
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
    public function destroy($id)
    {
        //
    }
}
