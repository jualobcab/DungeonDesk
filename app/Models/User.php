<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id_user
 * @property string|null $username
 * @property string|null $password
 * @property string|null $email
 * @property string|null $role
 * 
 * @property Collection|Campaign[] $campaigns
 * @property Collection|Character[] $characters
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'id_user';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'email',
		'role'
	];

	public function campaigns()
	{
		return $this->hasMany(Campaign::class, 'id_user');
	}

	public function characters()
	{
		return $this->hasMany(Character::class, 'id_user');
	}
}
