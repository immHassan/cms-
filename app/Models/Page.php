<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Page extends Model
{
    protected $guarded = [];
    protected $table = "pages";

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function hits()
    {
        return $this->hasMany(Hit_Record::class, 'entity_id');
    }
}