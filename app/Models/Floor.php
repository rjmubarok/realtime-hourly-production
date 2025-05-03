<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Floor extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function lines()
    {
        return $this->hasMany(Line::class);
    }
    public function npts()
    {
        return $this->hasMany(NPT::class);
    }

    public function generalinfos()
    {
        return $this->hasManyThrough(GeneralInfo::class, Line::class,'floor_id');
    }
    public function hourlyproductions()
    {
        return $this->hasMany(Hourlyproduction::class);
    }

}

