<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'gender_id', 'email', 'password', 'department_id', 'role_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function katabans_application_users()
    {
        return $this->hasMany(Kataban::class, 'application_user_id');
    }
    
    public function katabans_confirmed_users()
    {
        return $this->hasMany(Kataban::class, 'confirmed_user_id');
    }
    
    public function katabans_approval_users()
    {
        return $this->hasMany(Kataban::class, 'approval_user_id');
    }
    
    public function final_inspection_records()
    {
        return $this->hasMany(FinalInspectionRecord::class, 'inspector_id');
    }
}
