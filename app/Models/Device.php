<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $primaryKey = 'device_id';
    public $table = "devices";

    public $guarded = ['device_id'];
    protected $fillable = [
        'customer_id',
        'type',
        'brand',
        'model',
        'img_path'
    ];
    public function customer()
{
    return $this->belongsTo('App\Models\Customer');
}
}