<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hourlyproduction extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
    public function line()
{
    return $this->belongsTo(Line::class);
}
}
