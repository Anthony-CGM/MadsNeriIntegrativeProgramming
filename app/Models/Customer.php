<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customer extends Model
{
    use HasFactory;
    // use softDeletes;


    public $table = "customers";
    public $timestamps = true;
    public $primaryKey = "customer_id";
    public $guarded = ["customer_id"];
    
    protected $fillable = [
        "title",
        "lname",
        "fname",
        "addressline",
        "town",
        "zipcode",
        "phone",
        "img_path",
        "user_id"
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }      

    public function orders() {
        return $this->belongToMany(Order::class,'stockline','stockinfo_id','supply_id');
    }

    public function device()
    {
    return $this->hasMany('App\Models\Device','customer_id');
    }
    
    
}
