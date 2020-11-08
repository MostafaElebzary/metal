<?php

namespace App\Http\Controllers\cpanel;

use App\Client;
use App\Http\Controllers\Controller;
use App\MainData;
use App\Reciept;
use Illuminate\Http\Request;

class AccountStatements extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contract = null;
        $inreciept = null;
        return view('clients.account', compact('contract', 'inreciept'));
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
                'client_id' => 'required',
            ]
        );

        $contract = Client::where('id', $request->client_id)->first();
        $inreciept = Reciept::where('type', 'قبض')
            ->where('client_id', $request->client_id)->get();


        // session()->flash('success', trans('admin.updatedsuccess'));
        return view('clients.account', compact('contract', 'inreciept'));
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

    public function AccountPrint($id)
    {
        $contract = Client::where('id', $id)->first();
        $inreciept = Reciept::where('type', 'قبض')
            ->where('client_id', $id)->get(); 
        $maindata = MainData::first();
        return view('clients.printaccount', compact('contract', 'inreciept','maindata'));
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
