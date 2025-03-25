<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitType extends Model
{
    use HasFactory;

    protected $table = 'unit_types';

    protected $fillable = [
        'category_id',
        'unit_type',
        'status',
        'ct_date',
        'md_date'
    ];

    public $timestamps = false; 

   
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
