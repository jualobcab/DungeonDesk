<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Class
 * 
 * @property int $class_id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $subclass_level
 * 
 * @property Collection|CClass[] $c_classes
 * @property Collection|Feature[] $features
 * @property Collection|Subclass[] $subclasses
 *
 * @package App\Models
 */
class ClassInfo extends Model
{
	protected $table = 'classInfo';
	protected $primaryKey = 'class_id';
	public $timestamps = false;

	protected $casts = [
		'subclass_level' => 'int'
	];

	protected $fillable = [
		'name',
		'description',
		'subclass_level'
	];

	public function c_classes()
	{
		return $this->hasMany(CClass::class);
	}

	public function features()
	{
		return $this->belongsToMany(Feature::class, 'classfeature')
					->withPivot('level');
	}

	public function subclasses()
	{
		return $this->hasMany(Subclass::class);
	}
}
