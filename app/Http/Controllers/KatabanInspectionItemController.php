<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KatabanInspectionItem;
use App\KensaC2;
use App\Kataban;

class KatabanInspectionItemController extends Controller
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
        $kataban_inspection_items = KatabanInspectionItem::all();
        return view('kataban_inspection_items.index', ['kataban_inspection_items' => $kataban_inspection_items]);
        //return $kataban_inspection_items;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $kataban_inspection_item = new KatabanInspectionItem;
        $katabans = Kataban::all()->pluck('kataban', 'id');
        $kensa_c2s = KensaC2::all();
        
        /**
        $kensa_c2s = KensaC2::all();
        $didi = [];
        foreach($kensa_c2s as $kensa_c2){
            $didi[$kensa_c2->id] = $kensa_c2->kensa_c1->kensa_c1.'/'.$kensa_c2->kensa_c2;
        }
        **/
        
        $data = ['kataban_inspection_item' => $kataban_inspection_item, 'katabans' => $katabans, 'kensa_c2s' => $kensa_c2s];
        return view('kataban_inspection_items.create', $data);
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
            'kataban_id' => 'required|integer',
            'kensa_c2_id' => 'required|integer',
            'text_value' => 'nullable|max:100',
            'nominal_value' => 'nullable|numeric',
            'upper_value' => 'numeric|nullable',
            'lower_value' => 'nullable|numeric',
        ]);
        
        $kataban_inspection_item = new KatabanInspectionItem;
        $kataban_inspection_item->kataban_id = $request->kataban_id;
        $kataban_inspection_item->kensa_c2_id = $request->kensa_c2_id;
        $kataban_inspection_item->text_value = $request->text_value;
        $kataban_inspection_item->nominal_value = $request->nominal_value;
        $kataban_inspection_item->upper_value = $request->upper_value;
        $kataban_inspection_item->lower_value = $request->lower_value;
        
        $kataban_inspection_item->save();
        return redirect('kataban_inspection_items');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('kataban_inspection_items');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('kataban_inspection_items');
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
        return redirect('kataban_inspection_items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('kataban_inspection_items');
    }
}
