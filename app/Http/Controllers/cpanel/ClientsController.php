<?php

namespace App\Http\Controllers\cpanel;

use App\Client;
use App\File;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Reciept;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(
            \request(),
            [
                'projecttype_id' => 'required',
                'mainclient_id' => 'required',
                'name' => 'required',
                'address' => 'sometimes|nullable',
                'phone' => 'sometimes|nullable',
                'id_num' => 'sometimes|nullable',
                'check_num' => 'required',
                'check_date' => 'required',
                'part_number' => 'required',
                'scheme_number' => 'required',
                'taxepercent' => 'required',
                'total' => 'required',
                'amount' => 'required',
            ]
        );

        $client = Client::create($data);
        // insert payment data
        $rows = $request->input('rows');
        foreach ($rows as $row) {
            $payments[] = [
                'client_id' => $client->id,
                'number' => $row['number'],
                'name' => $row['name'],
                // 'payment_date' => $row['payment_date'],
                'amount' => $row['amount'],
            ];
        }
        Payment::insert($payments);
        //end insert payment data

        //insert files
        $atts = $request->input('atts');
        if ($request->file != null) {
            foreach ($atts as $key => $att) {

                if ($att['file_name'] != null) {
                    $files[] = [
                        'client_id' => $client->id,
                        'number' => $att['file_number'],
                        'name' => $att['file_name'],
                        'file' => $this->MoveImage($request->file[$key]),
                    ];
                }
            }

            File::insert($files);
        }
        //end inset file
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('client/create'));
    }

    public function MoveImage($request_file)
    {
        // This is Image Information ...
        $file = $request_file;
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();

        // Move Image To Folder ..
        $fileNewName = 'file' . $size . '_' . time() . '.' . $ext;
        $file->move(public_path('uploads/clients'), $fileNewName);

        return $fileNewName;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reciepts = Reciept::where('type', 'قبض')->where('client_id', $id)->get();
        return view('clients.payment', compact('reciepts'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client_data = Client::where('id', $id)->first();
        $payments = Payment::where('client_id', $id)->get();
        return view('clients.edit', compact('client_data', 'payments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate(
            \request(),
            [
                'projecttype_id' => 'required',
                'name' => 'required',
                'address' => 'sometimes|nullable',
                'phone' => 'sometimes|nullable',
                'id_num' => 'sometimes|nullable',
                'check_num' => 'required',
                'check_date' => 'required',
                'amount' => 'required',
                'part_number' => 'required',
                'scheme_number' => 'required',
                'taxepercent' => 'required',
                'total' => 'required',
                'amount' => 'required',
            ]
        );

        Client::where('id', $id)->update($data);
        //payment data
        $payments = Payment::where('client_id', $id)->get();

        foreach ($payments as $payment) {
            $payment->delete();
        }
        $rows = $request->input('rows');

        foreach ($rows as $row) {
            $pays[] = [
                'client_id' => $id,
                'number' => $row['number'],
                'name' => $row['name'],
                // 'payment_date' => $row['payment_date'],
                'amount' => $row['amount'],
            ];

        }
        Payment::insert($pays);

        return redirect(url('client'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
