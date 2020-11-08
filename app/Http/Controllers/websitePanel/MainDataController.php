<?php

namespace App\Http\Controllers\websitePanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MainData;

class MainDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $maindata = MainData::first();
        //   dd($maindata);
        return view('maindata.maindata', \compact('maindata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = $this->validate(
            \request(),
            [
                'name_ar' => 'required',
                'name_en' => 'required',
                'logo' => 'sometimes|nullable|mimes:jpg,jpeg,png,gif,bmp',
                'whatsapp' => 'required',
                'email' => 'required',
                'instagram' => 'required',
                'twitter' => 'required',
                'facebook' => 'required',
                'snapchat' => 'required',
                'finishedproject' => 'required|numeric',
                'inprogressproject' => 'required|numeric',
                'coveredcities' => 'required|numeric',
                'winningaward' => 'required|numeric',
                'dayopenfrom' => 'required',
                'dayopento' => 'required',
                'houropenfrom' => 'required',
                'houropento' => 'required',
                'daysclosed' => 'required',
                'contact_number' => 'required',
                'address_ar' => 'required',
                'address_en' => 'required'
            ]
        );
        // This is Image Information ...
        if ($request->logo != null) {
            $data['logo'] = $this->MoveImage($request['logo']);
        }
        MainData::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('maindata'));
    }

    public function MoveImage($request_file)
    {
        // This is Image Information ...
        $file    = $request_file;
        $name    = $file->getClientOriginalName();
        $ext     = $file->getClientOriginalExtension();
        $size    = $file->getSize();
        $path    = $file->getRealPath();
        $mime    = $file->getMimeType();

        // Move Image To Folder ..
        $fileNewName = 'logo' . $size . '_' . time() . '.' . $ext;
        $file->move(public_path('uploads'), $fileNewName);

        return $fileNewName;
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
