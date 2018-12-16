<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FinalInspectionRecord;
use App\User;
use App\Kataban;
use App\KatabanInspectionItem;

class FinalInspectionRecordsController extends Controller
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
        //
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
        return view('inspection.modelinput');
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
    
    public function start()
    {
        return view('inspection.modelinput');
    }
    
    public function modelquery(Request $request)
    {
        $this->validate($request, [
            'kataban' => 'required|max:100|exists:katabans,kataban',
        ], [
            'kataban.exists' => '存在しません',
        ]);
        
        $kataban = Kataban::where('kataban', $request->kataban)->first();
        $kataban_inspection_items = KatabanInspectionItem::where('kataban_id', $kataban->id)->get();
        
        $final_inspection_record = new FinalInspectionRecord;
        $final_inspection_record->kataban_id = $kataban->id;
        $data = [];
        $data = ['kataban' => $kataban, 'kataban_inspection_items' => $kataban_inspection_items, 'final_inspection_record' => $final_inspection_record];
        return view('inspection.create', $data);
    }
}
