<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KensaC2;
use App\KensaC1;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class KensaC2sController extends Controller
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
        $kensa_c2s = DB::select('select kensa_c2s.*, kensa_c1s.kensa_c1, kensa_c1s.display_no as c1d from kensa_c2s join kensa_c1s on kensa_c2s.kensa_c1_id = kensa_c1s.id order by kensa_c1s.display_no, kensa_c2s.display_no;');
        //$kensa_c2s = KensaC2::with(['kensa_c1' => function ($query) {
            //return $query->orderBy('display_no');
        //}])->orderBy('display_no')->get();
        return view('kensa_c2s.index', ['kensa_c2s' => $kensa_c2s]);
        //return $kensa_c2s;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $kensa_c2 = new KensaC2;
        $kensa_c1s = KensaC1::all()->pluck('kensa_c1', 'id');
        $data = ['kensa_c2' => $kensa_c2, 'kensa_c1s' => $kensa_c1s];
        return view('kensa_c2s.create', $data);
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
            'kensa_c1_id' => 'required|integer',
            'kensa_c2' => ['required', 'max:150',
                            Rule::unique('kensa_c2s')->where(function ($query) use($request) {
                                return $query->where('kensa_c1_id', $request->kensa_c1_id)
                                ->where('kensa_c2', $request->kensa_c2);
                            }),
                        ],
            'display_no' => 'required|integer|max:60000|min:0',
        ]);
        
        $kensa_c2 = new KensaC2;
        $kensa_c2->kensa_c1_id = $request->kensa_c1_id;
        $kensa_c2->kensa_c2 = $request->kensa_c2;
        $kensa_c2->display_no = $request->display_no;
        $kensa_c2->save();
        
        return redirect('kensa_c2s');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('kensa_c2s');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('kensa_c2s');
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
        return redirect('kensa_c2s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('kensa_c2s');
    }
}
