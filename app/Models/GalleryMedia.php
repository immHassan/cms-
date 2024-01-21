<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryMedia extends Model
{
    use HasFactory;
    
    protected $guarded = [];  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gallery_id',
        'image',
        'image_selection',
    ];
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
