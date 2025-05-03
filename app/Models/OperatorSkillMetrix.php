<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorSkillMetrix extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function floor()
    {
        return $this->hasOne(Floor::class, 'id', 'floor_id');
    }
    public function line()
    {
        return $this->hasOne(Line::class, 'id', 'line_id');
    }
    public function operator()
    {
        return $this->hasOne(Operator::class, 'id', 'operator_id');
    }
   
    public function designation()
    {
        return $this->hasOne(Designation::class, 'id', 'designation_id');
    }
}
