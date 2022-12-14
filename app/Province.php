<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = "province";
    protected $primaryKey = "id";
    protected $fillable = [
    	'id',
      'kode'
    	'nama'];

    public function tamu()
    {
    	return $this->hasMany(Tamu::class);
    }
}
