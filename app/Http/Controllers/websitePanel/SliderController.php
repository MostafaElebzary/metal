<?php

namespace App\Http\Controllers\websitePanel;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('slider.index', \compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');
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
                'sub_title_ar' => 'required',
                'sub_title_en' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png,gif,bmp',

            ]
        );
        // This is Image Information ...
        if ($request->image != null) {
            $data['image'] = $this->MoveImage($request['image']);
        }
        Slider::create($data);
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('slider'));
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

        $slider = Slider::where('id', $id)->first();
        //   dd($maindata);
        return view('slider.edit', \compact('slider'));
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
                'sub_title_ar' => 'required',
                'sub_title_en' => 'required',
                'image' => 'sometimes|nullable|mimes:jpg,jpeg,png,gif,bmp',

            ]
        );
        // This is Image Information ...
        if ($request->image != null) {
            $data['image'] = $this->MoveImage($request['image']);
        }
        Slider::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('slider'));
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
        $fileNewName = 'slider' . $size . '_' . time() . '.' . $ext;
        $file->move(public_path('uploads/slider'), $fileNewName);

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
        $user = Slider::findOrFail($id);
        $user->delete();
        session()->flash('success', trans('admin.deletesuccess'));
        return redirect(url('slider'));
    }
}
