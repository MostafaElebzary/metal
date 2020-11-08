<?php

namespace App\Http\Controllers\websitePanel;

use App\Http\Controllers\Controller;
use App\ManagerWord;
use Illuminate\Http\Request;

class ManagerWordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $managerword = ManagerWord::first();
        //   dd($managerword);
        return view('managerword.managerword', \compact('managerword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //managerword
        
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
                'position_ar' => 'required',
                'position_en' => 'required',
                'desc_ar' => 'required',
                'desc_en' => 'required',
                'image' => 'sometimes|nullable|mimes:jpg,jpeg,png,gif,bmp',
                
            ]
        );
        // This is Image Information ...
        if ($request->image != null) {
            $data['image'] = $this->MoveImage($request['image']);
        }
        ManagerWord::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('managerword'));
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
        $file->move(public_path('uploads/manager'), $fileNewName);

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
