<?php

namespace App\Http\Controllers\cpanel;

use App\Client;
use App\Http\Controllers\Controller;
use App\MainData;
use App\Reciept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReciptsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reciepts = Reciept::all();
        return view('recipts.index', \compact('reciepts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipts.createin');
    }

    public function createout()
    {
        return view('recipts.createout');
    }

    public function dataAjax(Request $request)
    {
    	$data = Client::select("id","name")->get();


        if($request->has('q')){
            $search = $request->q;
            $data = Client
            		::select("id","name")
                    ->where('name','LIKE',"%$search%")->orWhere('id_num','LIKE',"%$search%")
                    ->orWhere('phone','LIKE',"%$search%")
            		->get();
        }


        return response()->json($data);
    }
    public function clientdata($id)
    {
        $data_client = Client::where('id', $id)->first();
        $data_client_reciept = Reciept::where('client_id', $id)->sum('amount');
 
        return response()->json(['data_client' => $data_client,'data_client_reciept' => $data_client_reciept]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sms($mobile_num, $message)
    {

        $ch = curl_init();
        $url = "https://api.unifonic.com/wrapper/sendSMS.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "userid=fetoh@koof-ksa.com&password=fetoh0533097940&msg=" . $message . "&sender=EmarSrh&to=" . $mobile_num . "&encoding=UTF8"); // define what you want to post
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
    }

    public function store(Request $request)
    {
        $data = $this->validate(
            \request(),
            [
                'client_id' => 'required',
                'type' => 'required',
                'date' => 'required',
                'pay_type' => 'required', 
                'taxepercent' => 'required',
                'total' => 'required', 
                'amount' => 'required',
                'desc' => 'required',
            ]
        ); 
        $data['user_id'] = Auth::user()->id;
        $reciept = Reciept::create($data);
        if($request->type == 'قبض'){
            if($request->sendsms == 'yes'){
                $message = 'تم الاستلام من المكرم '.$reciept->getClient->name.' مبلغ وقدرة  '.$reciept->amount.'  ريال سعودي وذلك لسند قبض رقم '.$reciept->id;
               
                $this->sms($request->phone, $message);
            }
        }
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('recipts/' . $reciept->id));
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reciept = Reciept::where('id', $id)->first();
        $client_id = $reciept->client_id;
        $data_client = Client::where('id', $client_id)->first();
        $data_client_reciept = Reciept::where('client_id', $client_id)->sum('amount');

        $subtotal  = $data_client->amount -$data_client_reciept;
        $maindata = MainData::first();
        return view('recipts.print', compact('reciept', 'maindata','data_client','subtotal'));
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

    public function search(Request $request)
    {
        $reciepts =   Reciept::whereBetween('date', array($request->fromdate, $request->todate))
            ->where('type', $request->type)->where('pay_type', $request->pay_type)
            ->where('client_id', $request->client_id)->get();

        return view('recipts.index', \compact('reciepts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Reciept::findOrFail($id);
        $cat->delete();
        session()->flash('success', trans('admin.deletesuccess'));
        return redirect(url('recipts'));
    }
}
