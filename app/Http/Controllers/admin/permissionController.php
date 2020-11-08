<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
class permissionController extends Controller
{

    public function __construct(){
    	$this->middleware('auth');
    }
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
        $permission = Permission::where('user_id',$id)->first();
          
         return view('permission.permission',\compact('permission'));
        
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
        $data=$this->validate(\request(),
        [
            'inbox'=>'required|in:yes,no', 
            'deleteinbox'=>'required|in:yes,no',
            'addclient'=>'required|in:yes,no',
            'addinreciept'=>'required|in:yes,no',
            'addoutreciept'=>'required|in:yes,no',
            'recieptsarchieve'=>'required|in:yes,no',
            'clientsArchieve'=>'required|in:yes,no',
            'operationsonclients'=>'required|in:yes,no',
            'operationsonclientsarchieve'=>'required|in:yes,no',
            'clientaccountstatement'=>'required|in:yes,no',
            'websitepanel'=>'required|in:yes,no',
            'controllpanel'=>'required|in:yes,no',
            'homeinreciept'=>'required|in:yes,no',
            'homeoutreciept'=>'required|in:yes,no',

            
             
            
        ]); 
        Permission::where('id',$id)->update($data);
        session()->flash('success',trans('admin.updatedsuccess'));
        return redirect(url('users'));  
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
