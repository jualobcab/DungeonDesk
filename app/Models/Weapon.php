<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Weapon
 * 
 * @property int|null $equipment_id
 * @property int $weapon_id
 * @property string|null $type
 * @property int|null $damage_die
 * @property string|null $damage_type
 * 
 * @property Equipment|null $equipment
 *
 * @package App\Models
 */
class Weapon extends Model
{
	protected $table = 'weapon';
	protected $primaryKey = 'weapon_id';
	public $timestamps = false;

	protected $casts = [
		'equipment_id' => 'int',
		'damage_die' => 'int'
	];

	protected $fillable = [
		'equipment_id',
		'type',
		'damage_die',
		'damage_type'
	];

	public function equipment()
	{
		return $this->belongsTo(Equipment::class, 'equipment_id', 'equipment_id');
	}
}
