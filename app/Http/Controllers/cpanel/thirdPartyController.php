<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ThirdParty;
use Illuminate\Support\Facades\Hash;


class thirdPartyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thirdparty = ThirdParty::all();
        return view('thirdparty.index', \compact('thirdparty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thirdparty.create');
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
                'name' => 'required|unique:third_parties',
                'address' => 'required',
                'email' => 'required|unique:third_parties',
                'mobile' => 'required|numeric',
                'type' => 'required|in:export,import,all',
            ]
        );
 

        $user = ThirdParty::create($data);
         session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('thirdparty'));
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
        $user_data = ThirdParty::where('id', $id)->first();
        return view('thirdparty.edit', \compact('user_data'));
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
                'name' => 'required|unique:third_parties,name,' . $id, 
                'address' => 'required',
                'email' => 'required|unique:third_parties,email,' . $id, 
                'mobile' => 'required|numeric',
                'type' => 'required|in:export,import,all',
            ]
        );

        

        ThirdParty::where('id', $id)->update($data);
        session()->flash('success', trans('admin.editsuccess'));


        return redirect(url('thirdparty'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transactionstypes = ThirdParty::findOrFail($id);
        $transactionstypes->delete();
        session()->flash('success', trans('admin.deletesuccess'));


        return redirect(url('thirdparty'));
    }
}
