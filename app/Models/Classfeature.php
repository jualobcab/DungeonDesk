<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Classfeature
 * 
 * @property int $feature_id
 * @property int $class_id
 * @property int|null $level
 * 
 * @property Feature $feature
 * @property ClassInfo $class
 *
 * @package App\Models
 */
class Classfeature extends Model
{
	protected $table = 'classfeature';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'feature_id' => 'int',
		'class_id' => 'int',
		'level' => 'int'
	];

	protected $fillable = [
		'level'
	];

	public function feature()
	{
		return $this->belongsTo(Feature::class);
	}

	public function class()
	{
		return $this->belongsTo(ClassInfo::class);
	}
}
