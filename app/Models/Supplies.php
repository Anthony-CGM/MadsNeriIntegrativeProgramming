<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Supplies extends Model
{
    use HasFactory;
    public $table = 'supplies';
    public $primaryKey = 'supply_id';
    protected $guarded = ['supply_id'];
    public $timestamps = true;
    
    protected $fillable = [
        'supplier_id',
        'description',
        'price',
        'img_path',
    ];

    public function orders() {
        return $this->belongToMany(Order::class,'stockline','stockinfo_id','supply_id');
    }

    public function supplier() {
        return $this->belongsTo('App\Models\Supplier');
    }      


}
