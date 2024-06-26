<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile(){
        return $this->hasOne(Profile::class, 'user_id', 'id' );
    }
    public function vehicles(){
        return $this->hasMany(Vehicle::class, 'user_id', 'id');
    }
    public function post(){
        return $this->hasMany(Post::class, 'user_id','id');
    }
 
    public function quotations()
    {
        return $this->hasMany(Quotation::class, 'quotation_id');
    }
    public function userLeaveRequests()
    {
        return $this->hasMany(LeaveRequest::class, 'user_id');
    }

    public function approverLeaveRequests()
    {
        return $this->hasMany(LeaveRequest::class, 'approver_id');
    }


}
