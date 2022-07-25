<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vouncher extends Model
{
    use HasFactory;

    protected $table = 'vouchers';
    protected $guarded = [];

    public function property()
    {
        return $this->hasOne(Property::class,'id', 'property_id');
    }

}
