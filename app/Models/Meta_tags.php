<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Meta_tags extends Model
{
    protected $guarded = [];
    protected $table = "meta_tags";

    /**
     * An option belongs to one question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
