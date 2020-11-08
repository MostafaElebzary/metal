<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Reciept;
use App\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class UsersStatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $users = User::all();
        $reciept  = Reciept::where('type','قبض')->sum('amount');
        $branch_id=null;
         return view('userstatistic.index', \compact('users','reciept','branch_id'));
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
        $data = $this->validate(
            \request(),
            [
                'branch_id' => 'required', 
            ]
        );
        $users = User::where('branch_id',$request->branch_id)->get();
         
        $usersid[]=null;
        foreach($users as $key=> $user){
                $userid[$key] = $user->id;
        } 
        $reciept  = Reciept::where('type','قبض')->whereIn('user_id',$userid)->sum('amount');
        $branch_id = $request->branch_id;
         return view('userstatistic.index', \compact('users','reciept','branch_id'));
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
        //
    }
}
