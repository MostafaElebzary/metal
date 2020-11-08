<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Inbox;
use App\Reciept;
use App\Permission;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {  
        if(Auth::user()->type == 'admin'){

            $clients =Client::all();
            $inreciepts = Reciept::where('type','قبض')->get();
            $outreciepts = Reciept::where('type','صرف')->get();
            $inbox = Inbox::all();
        }
        else{
            $inreciepts = Reciept::where('type','قبض')->where('user_id',Auth::user()->id)->get();
            $outreciepts = Reciept::where('type','صرف')->where('user_id',Auth::user()->id)->get();
            $clients = null;
            $inbox  = null;
        }
        
        $user_id=auth()->user()->id;
        $permission =Permission::where('user_id',$user_id)->first();
        
        return view('home',compact('clients','inreciepts','outreciepts','inbox','permission'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients = Client::where('deligate_id',$id)->get();
        $deligate = User::where('id',$id)->first();
        return view('clientshow',compact('clients','deligate'));

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         

    }
}
