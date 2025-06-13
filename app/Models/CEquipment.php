<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CEquipment
 * 
 * @property int $equipment_id
 * @property int $id_character
 * @property int|null $quantity
 * 
 * @property Equipment $equipment
 * @property Character $character
 *
 * @package App\Models
 */
class CEquipment extends Model
{
	protected $table = 'c_equipment';
	public $incrementing = false;
	public $timestamps = false;
	protected $primaryKey = null;

	protected $casts = [
		'equipment_id' => 'int',
		'id_character' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'quantity'
	];

	public function equipment()
	{
		return $this->belongsTo(Equipment::class, 'equipment_id', 'equipment_id');
	}

	public function character()
	{
		return $this->belongsTo(Character::class, 'id_character', 'id_character');
	}

	public function getKeyName()
    {
        return null;
    }
}
