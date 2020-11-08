<?php

namespace App\Http\Controllers\websitePanel;

use App\Http\Controllers\Controller;
use App\LatestNew;
use Illuminate\Http\Request;

class LatestNews extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = LatestNew::all();
        return view('latestnews.index', \compact('news'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('latestnews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(
            \request(),
            [
                'title_ar' => 'required',
                'title_en' => 'required',
                'desc_ar' => 'required',
                'desc_en' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png,gif,bmp',

            ]
        );
        // This is Image Information ...
        if ($request->image != null) {
            $data['image'] = $this->MoveImage($request['image']);
        }
        LatestNew::create($data);
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('latestnews'));
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
        $fileNewName = 'service' . $size . '_' . time() . '.' . $ext;
        $file->move(public_path('uploads/latestnews'), $fileNewName);

        return $fileNewName;
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
        $service = LatestNew::where('id', $id)->first();
        //   dd($maindata);
        return view('latestnews.edit', \compact('service'));
 
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
        LatestNew::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('latestnews'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = LatestNew::findOrFail($id);
        $user->delete();
        session()->flash('success', trans('admin.deletesuccess'));
        return redirect(url('latestnews'));
    }
}
