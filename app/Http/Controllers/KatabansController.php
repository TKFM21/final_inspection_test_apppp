<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Kataban;
use App\FanKbn1;
use App\Status;
use App\User;
use App\KatabanInspectionItem;
use Illuminate\Support\Facades\Auth;

class KatabansController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $katabans = Kataban::all();
        //$kataban = Kataban::find(1);
        return view('katabans.index', ['katabans' => $katabans]);
        //return $kataban;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $kataban = new Kataban;
        $fan_kbn1s = FanKbn1::all()->pluck('fan_kbn1', 'id');
        $statuses = Status::all()->pluck('status', 'id');
        $data = ['kataban' => $kataban, 'fan_kbn1s' => $fan_kbn1s, 'statuses' => $statuses];
        return view('katabans.create', $data);
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
            'kataban' => 'required|max:100|unique:katabans,kataban',
            'rated_voltage' => 'required|integer|max:300|min:0',
            'fan_kbn1_id' => 'required|integer',
            'revision' => 'required',
        ]);
        
        $kataban = new Kataban;
        $kataban->kataban = $request->kataban;
        $kataban->rated_voltage = $request->rated_voltage;
        $kataban->fan_kbn1_id = $request->fan_kbn1_id;
        $kataban->revision = $request->revision;
        
        $status = Status::find(1);
        $kataban->status_id = $status->id;
        $kataban->save();
        
        return redirect('katabans');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('katabans');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('katabans');
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
        return redirect('katabans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('katabans');
    }
    
    public function items($id)
    {
        $kataban_inspection_items = KatabanInspectionItem::where('kataban_id', $id)->get();
        return view('katabans.items', ['kataban_inspection_items' => $kataban_inspection_items]);
    }
    
    public function application($id)
    {
        $kataban = Kataban::find($id);
        $kataban->application_at =  new Carbon;
        $user_id = Auth::id();
        $kataban->application_user_id = $user_id;
        $kataban->status_id = 2;
        $kataban->save();
        return redirect('katabans');
    }
    
    public function confirmed($id)
    {
        $kataban = Kataban::find($id);
        $kataban->confirmed_at =  new Carbon;
        $user_id = Auth::id();
        $kataban->confirmed_user_id = $user_id;
        $kataban->status_id = 3;
        $kataban->save();
        return redirect('katabans');
    }
    
    public function approval($id)
    {
        $kataban = Kataban::find($id);
        $kataban->approval_at =  new Carbon;
        $user_id = Auth::id();
        $kataban->approval_user_id = $user_id;
        $kataban->status_id = 4;
        $kataban->save();
        return redirect('katabans');
    }
    
    public function back($id)
    {
        $kataban = Kataban::find($id);
        $kataban->application_at =  NULL;
        $kataban->confirmed_at =  NULL;
        $kataban->approval_at =  NULL;

        $kataban->application_user_id = NULL;
        $kataban->confirmed_user_id = NULL;
        $kataban->approval_user_id = NULL;
        $kataban->status_id = 5;
        $kataban->save();
        return redirect('katabans');
    }
}
