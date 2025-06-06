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
 * @property ClassInfo $classInfo
 * @property Subclass|null $subclass
 *
 * @package App\Models
 */
class CClass extends Model
{
	protected $table = 'c_classes';
	public $incrementing = false;
	public $timestamps = false;
	protected $primaryKey = null;

	protected $casts = [
		'class_id' => 'int',
		'id_character' => 'int',
		'subclass_id' => 'int',
		'level' => 'int'
	];

	protected $fillable = [
		'subclass_id',
		'level'
	];

	public function character()
	{
		return $this->belongsTo(Character::class, 'id_character', 'id_character');
	}

	public function classInfo()
	{
		return $this->belongsTo(ClassInfo::class, 'class_id', 'class_id');
	}

	public function subclass()
	{
		return $this->belongsTo(Subclass::class, 'subclass_id', 'subclass_id');
	}

	public function getKeyName()
    {
        return null;
    }
}
