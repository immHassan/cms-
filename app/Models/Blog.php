<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Rateable;
use App\Traits\GlobalSearchable;


class Blog extends Model
{
    use HasFactory, SoftDeletes, Rateable, GlobalSearchable;

    protected $guarded = [];  
    protected $dates = ['deleted_at'];
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author',
        'category_name',
        'blog_category',
        'slug',
        'image',
        'image_selection',
        'content',
        'start_date',
        'end_date',
        'is_featured',
        'is_commentable',
        'is_published',
        'created_by',
        'deleted_at',
    ];
    /**
     * A poll has many options related to
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->hasMany(Meta_tags::class,'entity_id');
    }
    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function hits()
    {
        return $this->hasMany(Hit_Record::class, 'entity_id');
    }
    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
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

    protected $url = "/blog";

    /**
     * @var string
     */
    protected $searchIndex = 'Manage Blogs';
}
