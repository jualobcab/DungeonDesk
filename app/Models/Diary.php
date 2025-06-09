<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Diary
 * 
 * @property int $entry_id
 * @property int|null $id_character
 * @property int|null $id_campaign
 * @property string|null $entry
 * @property Carbon|null $date
 * 
 * @property Character|null $character
 * @property Campaign|null $campaign
 *
 * @package App\Models
 */
class Diary extends Model
{
	protected $table = 'diary';
	protected $primaryKey = 'entry_id';
	public $timestamps = false;

	protected $casts = [
		'id_character' => 'int',
		'id_campaign' => 'int',
		'date' => 'datetime'
	];

	protected $fillable = [
		'id_character',
		'id_campaign',
		'entry',
		'date'
	];

	public function character()
	{
		return $this->belongsTo(Character::class, 'id_character', 'id_character');
	}

	public function campaign()
	{
		return $this->belongsTo(Campaign::class, 'id_campaign', 'id_campaign');
	}
}
