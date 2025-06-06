<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Subclass
 * 
 * @property int $subclass_id
 * @property int|null $class_id
 * @property string|null $name
 * @property string|null $description
 * 
 * @property ClassInfo|null $class
 * @property Collection|CClass[] $c_classes
 * @property Collection|Feature[] $features
 *
 * @package App\Models
 */
class Subclass extends Model
{
	protected $table = 'subclass';
	protected $primaryKey = 'subclass_id';
	public $timestamps = false;

	protected $casts = [
		'class_id' => 'int'
	];

	protected $fillable = [
		'class_id',
		'name',
		'description'
	];

	public function class()
	{
		return $this->belongsTo(ClassInfo::class);
	}

	public function c_classes()
	{
		return $this->hasMany(CClass::class);
	}

	public function features()
	{
		return $this->belongsToMany(Feature::class, 'subclassfeature')
					->withPivot('level');
	}
}
