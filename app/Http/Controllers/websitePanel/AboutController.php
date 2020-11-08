<?php

namespace App\Http\Controllers\websitePanel;

use App\about;
use App\Http\Controllers\Controller;
use App\Point;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = about::first();
        return view('about.edit', \compact('about'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show()
    {
        $points = Point::all();
        return view('about.index', \compact('points'));
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    public function editpoints($id)
    {
         $points = Point::where('id',$id)->first();
        return view('about.editpoint', \compact('points'));
   
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
                'title_ar' => 'required',
                'title_en' => 'required',
                'desc_ar' => 'required',
                'desc_en' => 'required',
                // 'image' => 'required|mimes:jpg,jpeg,png,gif,bmp',

            ]
        );
        // This is Image Information ...
        if ($request->image != null) {
            $data['image'] = $this->MoveImage($request['image']);
        }
        about::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('about'));
    
    }
    public function updatepoints(Request $request, $id)
    {
        $data = $this->validate(
            \request(),
            [
                'point_ar' => 'required',
                'point_en' => 'required',

            ]
        );
        // This is Image Information ...
       
        Point::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('points'));
    
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
        $fileNewName = 'burchase' . $size . '_' . time() . '.' . $ext;
        $file->move(public_path('uploads/burchase'), $fileNewName);

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
