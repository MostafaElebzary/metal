<?php

namespace App\Http\Controllers\websitePanel;

use App\Http\Controllers\Controller;
use App\WhyUs;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whyus = WhyUs::all();
        //   dd($maindata);
        return view('whyus.index', \compact('whyus'));
 
    }

   
    public function edit($id)
    {
        $whyus = WhyUs::where('id',$id)->first();
        //   dd($maindata);
        return view('whyus.edit', \compact('whyus'));
 
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
                'question_ar' => 'required',
                'question_en' => 'required', 
                'answer_ar' => 'required',
                'answer_en' => 'required',
                
            ]
        );
      
        WhyUs::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updatedsuccess'));
        return redirect(url('whyus'));
   
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
