<?php

namespace App\Http\Controllers\websitePanel;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;

class PartenersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parteners = Partner::all();
        return view('parteners.index', \compact('parteners'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parteners.create');

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
                'image' => 'required',

            ]
        ); 
        
        // This is Images Information ...
        if ($request->image != null) {
            foreach ($request['image'] as $image) {
                # code...
                $input['image'] = $this->MoveImage($image);
                Partner::create($input);
            }
        }
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('parteners'));
    
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
        $fileNewName = 'partener' . $size . '_' . time() . '.' . $ext;
        $file->move(public_path('uploads/parteners'), $fileNewName);

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
        
        $parteners = Partner::findOrFail($id);
        $parteners->delete();
        session()->flash('success', trans('admin.deletesuccess'));
        return redirect(url('parteners'));
    }
}
