<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\GlobalSearchable;

class Banner extends Model
{
    use HasFactory;
    use SoftDeletes, GlobalSearchable;

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
    protected $url = "/banners";


    /**
     * @var string
     */
    protected $searchIndex = 'Manage Banners';
}
