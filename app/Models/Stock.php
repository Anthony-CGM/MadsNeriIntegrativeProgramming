<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $primaryKey = 'supply_id';
    protected $table = 'stock';
	public $timestamps = false;
	protected $fillable = [
        'quantity',
        'supply_id'];
	
	public function supply(){
    	return $this->belongsTo('App\Models\Supplies','supply_id');
    }

}