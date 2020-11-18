<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\MainClient;
use Illuminate\Http\Request;

class MainClientController extends Controller
{
    public function index()
    {

        $mainclients = MainClient::all();
        return view('mainclient.index', \compact('mainclients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mainclient.create');

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
                'name' => 'required',
                'id_num' => 'required',
                'address' => 'required',
                'phone' => 'required|unique:main_clients|regex:/(9665)[0-9]{7}/',
            ]
        );

        MainClient::create($data);
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('mainclient'));
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
        $category = MainClient::where('id', $id)->first();
         return view('mainclient.edit', \compact('category'));

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
                'name' => 'required',
                'id_num' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ]
        );

        MainClient::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('mainclient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = MainClient::findOrFail($id);
        $cat->delete();
        session()->flash('success', trans('admin.deletesuccess'));
        return redirect(url('mainclient'));
    }
}
