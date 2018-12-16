<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Gender;
use App\Department;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function gindex()
    {
        $genders = Gender::all();
        return view('gender.index', ['genders' => $genders]);
        //return $genders;
    }
    
    public function create()
    {
        $gender = new Gender;
        return view('gender.create', $gender);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'gender' => 'required|max:191',
        ]);

        $gender = new Gender;
        $gender->gender = $request->gender;
        $gender->save();

        return redirect()->back();
    }
    
    public function dindex()
    {
        $departments = Department::all();
        return view('department.index', ['departments' => $departments]);
    }
    
    public function dcreate()
    {
        $department = new Department;
        return view('department.create', $department);
    }
    
    public function dstore(Request $request)
    {
        $this->validate($request, [
            'department' => 'required|max:191',
        ]);
        
        $department = new Department;
        $department->department = $request->department;
        $department->save();
        
        return redirect()->back();
    }
    
    public function rindex()
    {
        $roles = Role::all();
        return view('role.index', ['roles' => $roles]);
    }
    
    public function rcreate()
    {
        $role = new Role;
        return view('role.create', $role);
    }
    
    public function rstore(Request $request)
    {
        $this->validate($request, [
            'role' => 'required|max:30|unique:roles,role',
            'priority' => 'required|integer|max:20|min:1|unique:roles,priority',
        ]);
        
        $role = new Role;
        $role->role = $request->role;
        $role->priority = $request->priority;
        $role->save();
        
        return redirect()->back();
    }
    
    public function usersIndex()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }
}
