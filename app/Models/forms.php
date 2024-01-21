<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GlobalSearchable;

class Forms extends Model
{
    use HasFactory, GlobalSearchable;

    
    protected $guarded = []; 
    
    
    protected  $search = [
        'title'
    ];

     /**
     * The columns that should be displayed.
     *
     * @var array
     */
    protected $only = [
        'title'
    ];

    /**
     * The columns that should be ordered.
     *
     * @var array
     */
    protected  $order = [
        'title' => 'desc'
    ];
    protected $url = "/forms";


    /**
     * @var string
     */
    protected $searchIndex = 'Manage Forms';

}
