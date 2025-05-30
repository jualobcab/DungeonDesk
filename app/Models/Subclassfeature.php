<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subclassfeature
 * 
 * @property int $feature_id
 * @property int $subclass_id
 * @property int|null $level
 * 
 * @property Feature $feature
 * @property Subclass $subclass
 *
 * @package App\Models
 */
class Subclassfeature extends Model
{
	protected $table = 'subclassfeature';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'feature_id' => 'int',
		'subclass_id' => 'int',
		'level' => 'int'
	];

	protected $fillable = [
		'level'
	];

	public function feature()
	{
		return $this->belongsTo(Feature::class);
	}

	public function subclass()
	{
		return $this->belongsTo(Subclass::class);
	}
}
