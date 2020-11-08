<?php

namespace App\Http\Controllers\inbox;

use App\Client;
use App\Http\Controllers\Controller;
use App\Inbox;
use App\Message;
use App\Permission;
use Illuminate\Http\Request;

class inboxController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $permission = Permission::where('user_id', $user_id)->first();
        $enabled =  $permission->inbox;
        if ($enabled == 'yes') {

            $inbox = Inbox::all();
            return view('inbox.index', \compact('inbox'));
        } else {
            return redirect(url('home'));
        }
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
                'fullname' => 'required|min:6',
                'phone' => 'required|min:6',
                'email' => 'required|min:6|email',
                'message' => 'required|min:6',
            ]
        );

        Inbox::create($data);
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('/'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Inbox::where('id', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function messageList($id)
    {

        $data = Message::where('inbox_id', $id)->get();

        return view('inbox.messaggesList', \compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Inbox::where('id', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function clientdata($id)
    {
        $data = Client::where('id', $id)->first();
        return response()->json(['data' => $data]);
    }


    public function sendmessage(Request $request)
    {
        $data = $this->validate(
            \request(),
            [
                'inbox_id' => 'required',
                'phone' => 'required|min:12',
                'message' => 'required|min:6',
            ]
        );

        //sent sms api here
        $this->sms($request->phone, $request->message);
        ///////////////////
        //

        Message::create($data);
        session()->flash('success', trans('admin.sentsuccesfully'));
        return redirect(url('inbox'));
    }


    public function clientsendmessage(Request $request)
    {
        $data = $this->validate(
            \request(),
            [
                'phone' => 'required|min:12',
                'message' => 'required|min:6',
            ]
        );

        //sent sms api here
        $this->sms($request->phone, $request->message);
        ///////////////////
        //

        // Message::create($data);
        session()->flash('success', trans('admin.sentsuccesfully'));
        return redirect(url('client'));
    }


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
        $user_id = auth()->user()->id;
        $permission = Permission::where('user_id', $user_id)->first();
        $enabled =  $permission->inbox;
        if ($enabled == 'yes') {

            $cat = Inbox::findOrFail($id);
            $cat->delete();
            session()->flash('success', trans('admin.deletesuccess'));
            return redirect(url('inbox'));
        } else {
            return redirect(url('home'));
        }
    }
}
