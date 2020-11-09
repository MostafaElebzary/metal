<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransactionsType;
use Illuminate\Support\Facades\Hash;


class transactionsTypesController extends Controller
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
        $transactions_type = TransactionsType::all();
        return view('transactionstypes.index', \compact('transactions_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactionstypes.create');
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
                // 'code' => 'required|unique:transactions_types',
                'status' => 'required|in:active,deactive',
                'name' => 'required|unique:transactions_types',
                'type' => 'required|in:export,import,all',

            ]
        );
 
                $data['code'] = mt_rand(100, 9999999999);

        $user = TransactionsType::create($data);
         session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('transactionstypes'));
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
        $user_data = TransactionsType::where('id', $id)->first();
        return view('transactionstypes.edit', \compact('user_data'));
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
                'name' => 'required|unique:transactions_types,name,' . $id, 
                'code' => 'required|unique:transactions_types,code,'.$id,
                'status' => 'required|in:active,deactive',
                'type' => 'required|in:export,import,all',
            ]
        );

        

        TransactionsType::where('id', $id)->update($data);
        session()->flash('success', trans('admin.editsuccess'));


        return redirect(url('transactionstypes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transactionstypes = TransactionsType::findOrFail($id);
        $transactionstypes->delete();
        session()->flash('success', trans('admin.deletesuccess'));


        return redirect(url('transactionstypes'));
    }
}
