<?php

namespace App\Http\Controllers\cpanel;

use App\Branch;
use App\Client;
use App\Http\Controllers\Controller;
use App\MainClient;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Branch::all();
        return view('branch.index', \compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branch.create');
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
                'name' => 'required|min:6',
            ]
        );

        Branch::create($data);
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('branch'));
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
        $category = Branch::where('id', $id)->first();
        //   dd($maindata);
        return view('branch.edit', \compact('category'));
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
                'name' => 'required|min:6',

            ]
        );

        Branch::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('branch'));
    }

    public function sendall()
    {

        return view('branch.sendall');
    }

    public function send(Request $request)
    {
        $data = $this->validate(
            \request(),
            [
                'message' => 'required|min:6',
            ]
        );

         $clients = MainClient::select('phone')->pluck('phone');
          if (count($clients) != 0) {

            foreach ($clients as $client) {
                $output[] = $client;
            }
           $numbers = implode(', ', $output);
            //try to put array of number instead of array
             $this->sms($numbers, $request->message);

        }

        session()->flash('success', 'تم الارسال بنجاح');

        return redirect(url('sendall'));



    }

    public function sms($mobile_num, $message)
    {

        $ch = curl_init();
        $url = "https://api.unifonic.com/wrapper/sendSMS.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "userid=fetoh@koof-ksa.com&password=$a<$/kfG~?!@g=G=&msg=" . $message . "&sender=EmarSrh&to=" . $mobile_num . "&encoding=UTF8"); // define what you want to post
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 1) {

            session()->flash('error', trans('admin.adminnotdeleted'));
            return redirect(url('branch'));
        }
        $cat = Branch::findOrFail($id);
        $cat->delete();
        session()->flash('success', trans('admin.deletesuccess'));
        return redirect(url('branch'));
    }
}
