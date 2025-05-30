<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CClass
 * 
 * @property int $class_id
 * @property int $id_character
 * @property int|null $subclass_id
 * 
 * @property Character $character
 * @property Class $class
 * @property Subclass|null $subclass
 *
 * @package App\Models
 */
class CClass extends Model
{
	protected $table = 'c_classes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'class_id' => 'int',
		'id_character' => 'int',
		'subclass_id' => 'int'
	];

	protected $fillable = [
		'subclass_id'
	];

	public function character()
	{
		return $this->belongsTo(Character::class, 'id_character');
	}

	public function class()
	{
		return $this->belongsTo(Class::class);
	}

	public function subclass()
	{
		return $this->belongsTo(Subclass::class);
	}
}
