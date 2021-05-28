<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserRole;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'user_type_id',
        'gender',
        'status',
        'email',
        'password',
        'created_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The roles that belong to the user.
     */
    public function schedules()
    {
        return $this->belongsToMany(Schedule::class, 'user_schedules');
    }

    public function hasRole($role)
    {
        $hasRole = DB::select("SELECT * FROM `user_roles` 
        INNER JOIN roles ON user_roles.role_id = roles.id
        where user_roles.user_id = $this->id 
        AND roles.roles = '$role'");

        if(empty($hasRole)){
            return false;
        }else{
            return true;
        }
        
    }
}
