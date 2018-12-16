<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KensaC1;

class KensaC1sController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kensa_c1s = KensaC1::orderBy('display_no')->get();
        return view('kensa_c1s.index', ['kensa_c1s' => $kensa_c1s]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kensa_c1 = new KensaC1;
        return view('kensa_c1s.create', ['kensa_c1' => $kensa_c1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kensa_c1' => 'required|max:100|unique:kensa_c1s,kensa_c1',
            'display_no' => 'required|integer|max:60000|min:0|unique:kensa_c1s,display_no',
        ]);
        
        $kensa_c1 = new KensaC1;
        $kensa_c1->kensa_c1 = $request->kensa_c1;
        $kensa_c1->display_no = $request->display_no;
        $kensa_c1->save();
        return redirect('kensa_c1s');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('kensa_c1s');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('kensa_c1s');
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
        return redirect('kensa_c1s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('kensa_c1s');
    }
}
