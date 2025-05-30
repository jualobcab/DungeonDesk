<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Campaign
 * 
 * @property int $id_campaign
 * @property int|null $id_user
 * @property string|null $name
 * @property string|null $description
 * 
 * @property User|null $user
 * @property Collection|CMember[] $c_members
 * @property Collection|Diary[] $diaries
 *
 * @package App\Models
 */
class Campaign extends Model
{
	protected $table = 'campaign';
	protected $primaryKey = 'id_campaign';
	public $timestamps = false;

	protected $casts = [
		'id_user' => 'int'
	];

	protected $fillable = [
		'id_user',
		'name',
		'description'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function c_members()
	{
		return $this->hasMany(CMember::class, 'id_campaign');
	}

	public function diaries()
	{
		return $this->hasMany(Diary::class, 'id_campaign');
	}
}
