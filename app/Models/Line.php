<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Line extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function floor()
    {
        return $this->hasOne(Floor::class, 'id', 'floor_id');
    }
    public function general_infos()
    {
        return $this->hasMany(GeneralInfo::class);
    }

    public function floors()
    {
        return $this->belongsTo(Floor::class,'floor_id','id');
    }
    public function npts()
    {
        return $this->hasMany(NPT::class,'line_id','id');
    }

    public function hourlyproductions()
{
    return $this->hasMany(Hourlyproduction::class);
}

public function productions()
{
    return $this->hasMany(HourlyProduction::class);
}
}
