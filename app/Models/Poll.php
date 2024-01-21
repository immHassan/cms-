<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\GlobalSearchable;

class Poll extends Model
{
    use HasFactory;
    use SoftDeletes, GlobalSearchable;
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

    protected $url = "/polls";

    /**
     * @var string
     */
    protected $searchIndex = 'Manage Polls';

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
