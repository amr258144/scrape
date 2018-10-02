<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indiamart extends Model
{
    protected $table = 'indiamart';
	protected $primaryKey = 'id';
	public $timestamps = false;

	public function getTableName(){
		return $this->table;
	}
}
