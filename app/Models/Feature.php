<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Feature
 * 
 * @property int $feature_id
 * @property string|null $name
 * @property string|null $description
 * 
 * @property Collection|ClassInfo[] $classes
 * @property Collection|Subclass[] $subclasses
 *
 * @package App\Models
 */
class Feature extends Model
{
	protected $table = 'feature';
	protected $primaryKey = 'feature_id';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'description'
	];

	public function classes()
	{
		return $this->belongsToMany(ClassInfo::class, 'classfeature', 'feature_id', 'class_id')
					->withPivot('level');
	}

	public function subclasses()
	{
		return $this->belongsToMany(Subclass::class, 'subclassfeature', 'feature_id', 'subclass_id')
					->withPivot('level');
	}
}
