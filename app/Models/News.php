<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\GlobalSearchable;

class News extends Model
{
    use HasFactory, SoftDeletes, GlobalSearchable;

    protected $guarded = [];  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'image',
        'image_selection',
        'content',
        'start_date',
        'end_date',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'is_featured', 
        'created_by',
        'deleted_at',
    ];

    protected  $search = [
        'title', 'content',
    ];

     /**
     * The columns that should be displayed.
     *
     * @var array
     */
    protected $only = [
        'title', 'content'
    ];

    /**
     * The columns that should be ordered.
     *
     * @var array
     */
    protected  $order = [
        'title' => 'desc',
        'content' => 'desc'
    ];
    protected $url = "/news";


    /**
     * @var string
     */
    protected $searchIndex = 'Manage News';
}
