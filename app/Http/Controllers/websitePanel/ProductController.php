<?php

namespace App\Http\Controllers\websitePanel;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();
        return view('Product.index', \compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Product.create');
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
                'title_en' => 'required',
                'title_ar' => 'required',
                'desc_ar' => 'required',
                'desc_en' => 'required',
                'cat_id' => 'required',
                'image' => 'required',

            ]
        );

        $product =   Product::create($data);

        // This is Image Information ...
        if ($request->image != null) {
            foreach ($request['image'] as $image) {
                # code...
                $input['image'] = $this->MoveImage($image);
                $input['product_id'] = $product->id;
                ProductDetail::create($input);
            }
        }
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('works'));
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
        $file->move(public_path('uploads/products'), $fileNewName);

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
        
        $product = Product::where('id', $id)->first();
        //   dd($maindata);
        return view('Product.edit', \compact('product'));
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
                'title_en' => 'required',
                'title_ar' => 'required',
                'desc_ar' => 'required',
                'desc_en' => 'required',
                'cat_id' => 'required',
            ]
        );
       
        Product::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('works'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $product = Product::findOrFail($id);
        $product->delete();
        session()->flash('success', trans('admin.deletesuccess'));
        return redirect(url('works'));
    }
}
