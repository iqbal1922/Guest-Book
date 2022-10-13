<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $table = "tamu";
    protected $primaryKey = "id";
    protected $fillable = [
    	'id',
    	'first_name',
      'last_name',
    	'phone',
    	'address',
    	'organization',
      'province',
      'city',
      'jenistamu_id',
    ];
    public function jenistamu()
    {
    	return $this->belongsTo(Jenistamu::class);
    }
}
