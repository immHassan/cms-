<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GlobalSearchable;

class Categories extends Model
{
    use HasFactory, GlobalSearchable;
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'is_visible',
        'parent_id',
        'created_by',
    ];
    public function subcategories()
    {
        return $this->hasMany(Categories::class, 'parent_id','id');
    }

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

    protected $url = "/categories";

    /**
     * @var string
     */
    protected $searchIndex = 'Manage Categories';
}
