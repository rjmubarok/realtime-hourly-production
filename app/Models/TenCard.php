<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenCard extends Model
{ use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function floor()
    {
        return $this->hasOne(Floor::class, 'id', 'floor_id');
    }
    public function line()
    {
        return $this->hasOne(Line::class, 'id', 'line_id');
    }
}
