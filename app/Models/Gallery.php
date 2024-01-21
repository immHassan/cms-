<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GlobalSearchable;

class Gallery extends Model
{
    use HasFactory, GlobalSearchable;
    
    protected $guarded = [];  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'event_id',
        'title',
        'slug',
        'image',
        'image_selection',
        'content',
        'start_date',
        'end_date',
        'is_featured',
        'is_visible',
        'created_by',
    ];
    public function medias()
    {
        return $this->hasMany(GalleryMedia::class)->orderBy('id','desc');
    }


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
    protected $url = "/gallery";


    /**
     * @var string
     */
    protected $searchIndex = 'Manage Gallery';
}
