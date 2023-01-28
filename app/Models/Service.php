<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Service extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $primaryKey = 'service_id';
    public $table = "services";

    public $guarded = ['service_id'];
    protected $fillable = [
        'description',
        'price',
        'img_path'
    ];


    

}

