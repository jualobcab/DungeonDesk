<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Equipment
 * 
 * @property int $equipment_id
 * @property string|null $name
 * @property string|null $rarity
 * @property string|null $description
 * @property string|null $type
 * 
 * @property Collection|Armor[] $armors
 * @property Collection|Artifact[] $artifacts
 * @property Collection|CEquipment[] $c_equipments
 * @property Collection|Weapon[] $weapons
 *
 * @package App\Models
 */
class Equipment extends Model
{
	protected $table = 'equipment';
	protected $primaryKey = 'equipment_id';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'rarity',
		'description',
		'type'
	];

	public function armors()
	{
		return $this->hasMany(Armor::class);
	}

	public function artifacts()
	{
		return $this->hasMany(Artifact::class);
	}

	public function c_equipments()
	{
		return $this->hasMany(CEquipment::class);
	}

	public function weapons()
	{
		return $this->hasMany(Weapon::class);
	}
}
