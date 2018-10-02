<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wordpress extends Model
{
    protected $table = 'wordpress';
	protected $primaryKey = 'id';
	public $timestamps = false;

	public function getTableName(){
		return $this->table;
	}
}
