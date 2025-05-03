<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $guarded = [];

	public function Employee()
    {
    	return $this->belongsTo('App\Employee', 'full_name');
    }
	public function Hierarchy()
    {
    	return $this->belongsTo('App\Hierarchy', 'h_name');
    }
}
