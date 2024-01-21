<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\Voter;
use App\Traits\GlobalSearchable;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Voter, GlobalSearchable;

    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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


    protected  $search = [
        'name'
    ];

     /**
     * The columns that should be displayed.
     *
     * @var array
     */
    protected $only = [
        'name'
    ];

    /**
     * The columns that should be ordered.
     *
     * @var array
     */
    protected  $order = [
        'name' => 'desc'
    ];
    
    protected $url = "/users";


    /**
     * @var string
     */
    protected $searchIndex = 'Manage Users';


}
