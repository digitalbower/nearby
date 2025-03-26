<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class CategoryUnitMaster extends Model
{
    use HasFactory;

    protected $table = 'category_unit';

    protected $fillable = ['category_id', 'unit_type_id', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unitType()
    {
        return $this->belongsTo(UnitType::class);
    }
}
