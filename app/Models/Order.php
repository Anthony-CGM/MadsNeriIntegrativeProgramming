<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'stockinfo';
	protected $primaryKey = 'stockinfo_id';
	public $timestamps = false;
	protected $fillable = [
        'employee_id',
        'date_placed',
		'date_shipped',
        'status'
    ];
	
	public function employees(){
		return $this->belongsTo('App\Models\Employee');
	}

	public function supplies(){
		return $this->belongsToMany(Supplies::class,'stockline','supply_id','stockinfo_id')->withPivot('quantity');
	}
    
}