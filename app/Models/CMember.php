<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CMember
 * 
 * @property int $id_character
 * @property int $id_campaign
 * 
 * @property Character $character
 * @property Campaign $campaign
 *
 * @package App\Models
 */
class CMember extends Model
{
	protected $table = 'c_members';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_character' => 'int',
		'id_campaign' => 'int'
	];

	public function character()
	{
		return $this->belongsTo(Character::class, 'id_character');
	}

	public function campaign()
	{
		return $this->belongsTo(Campaign::class, 'id_campaign');
	}
}
