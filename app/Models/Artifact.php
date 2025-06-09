<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Artifact
 * 
 * @property int|null $equipment_id
 * @property int $artifact_id
 * @property string|null $type
 * 
 * @property Equipment|null $equipment
 *
 * @package App\Models
 */
class Artifact extends Model
{
	protected $table = 'artifact';
	protected $primaryKey = 'artifact_id';
	public $timestamps = false;

	protected $casts = [
		'equipment_id' => 'int'
	];

	protected $fillable = [
		'equipment_id',
		'type'
	];

	public function equipment()
	{
		return $this->belongsTo(Equipment::class, 'equipment_id', 'equipment_id');
	}
}
