<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Character
 * 
 * @property int $id_character
 * @property int|null $id_user
 * @property string|null $name
 * @property int|null $level
 * @property string|null $biography
 * 
 * @property User|null $user
 * @property Collection|CClass[] $c_classes
 * @property Collection|CEquipment[] $c_equipments
 * @property Collection|CMember[] $c_members
 * @property Collection|Diary[] $diaries
 *
 * @package App\Models
 */
class Character extends Model
{
	protected $table = 'characters';
	protected $primaryKey = 'id_character';
	public $timestamps = false;

	protected $casts = [
		'id_user' => 'int',
		'level' => 'int'
	];

	protected $fillable = [
		'id_user',
		'name',
		'level',
		'biography'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function c_classes()
	{
		return $this->hasMany(CClass::class, 'id_character');
	}

	public function c_equipments()
	{
		return $this->hasMany(CEquipment::class, 'id_character');
	}

	public function c_members()
	{
		return $this->hasMany(CMember::class, 'id_character');
	}

	public function diaries()
	{
		return $this->hasMany(Diary::class, 'id_character');
	}
}
