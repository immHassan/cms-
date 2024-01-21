<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Navbar extends Model
{
    protected $guarded = [];
    protected $table = "navbar";


    public function navbar_detail()
    {
        return $this->hasMany(Navbar_detail::class,'navbar_id','id');
    }


}