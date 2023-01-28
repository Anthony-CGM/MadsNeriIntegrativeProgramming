<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    public $table = "suppliers";
    public $timestamps = true;
    public $primaryKey = "supplier_id";
    


    protected $fillable = [
        
        "name",
        "addressline",
        "img_path",
    ];

    public function supplies()
    {   
        return $this->hasMany('App\Models\Supplies','supplier_id');
    }

}
