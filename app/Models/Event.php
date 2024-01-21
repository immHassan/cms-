<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GlobalSearchable;

class Event extends Model
{
    use HasFactory, GlobalSearchable;
  
    protected $fillable = [
        'title','className', 'organizer', 'location_or_url','start_time','end_time', 'content', 'start', 'end'
    ];
    
    protected  $search = [
        'title','content'
    ];

     /**
     * The columns that should be displayed.
     *
     * @var array
     */
    protected $only = [
        'title','content'
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
    protected $url = "/events";


    /**
     * @var string
     */
    protected $searchIndex = 'Manage Events';
}