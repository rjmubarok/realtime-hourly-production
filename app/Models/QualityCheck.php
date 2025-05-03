<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QualityCheck extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded =[];

    public function user()
    {
        return $this->hasOne(User::class, 'id','created_by');
    }
    public function buyer()
    {
        return $this->hasOne(Buyer::class, 'id','buyer_id');
    }
    public function operator()
    {
        return $this->hasOne(Operator::class, 'id','buyer_id');
    }
    public function line()
    {
        return $this->hasOne(Line::class, 'id','line_id');
    }
    public function floor()
    {
        return $this->hasOne(Line::class, 'id','floor_id');
    }
    public function defectCode()
    {
        return $this->hasOne(DefectCode::class, 'id','defect_code_id');
    }
}
