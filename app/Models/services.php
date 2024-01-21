<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;

    
    protected $guarded = [];  

    public function service_links()
    {
        return $this->hasMany(Service_links::class,'service_id','id');
    }


}
