<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FanKbn1;

class FanKbn1sController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fankbn1 = FanKbn1::all();
        return view('fan_kbn1s.index', ['fankbn1s' => $fankbn1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fankbn1 = new FanKbn1;
        return view('fan_kbn1s.create', ['fan_kbn1' => $fankbn1]);
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
            'fan_kbn1' => 'required|max:100|unique:fan_kbn1s,fan_kbn1',
        ]);
        
        $fankbn1 = new FanKbn1;
        $fankbn1->fan_kbn1 = $request->fan_kbn1;
        $fankbn1->save();
        return redirect('fan_kbn1s');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('/');
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
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('/');
    }
}
