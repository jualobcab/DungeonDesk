<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Armor
 * 
 * @property int|null $equipment_id
 * @property int $armor_id
 * @property string|null $type
 * @property int|null $armor_class
 * 
 * @property Equipment|null $equipment
 *
 * @package App\Models
 */
class Armor extends Model
{
	protected $table = 'armor';
	protected $primaryKey = 'armor_id';
	public $timestamps = false;

	protected $casts = [
		'equipment_id' => 'int',
		'armor_class' => 'int'
	];

	protected $fillable = [
		'equipment_id',
		'type',
		'armor_class'
	];

	public function equipment()
	{
		return $this->belongsTo(Equipment::class);
	}
}
