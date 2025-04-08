<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class User extends Eloquent implements UserInterface, RemindableInterface {
	
	use UserTrait, RemindableTrait;
	
	/**
	* The database table used by the model.
	*
	* @var string
	*/
	protected $table = 'users';
	
	/**
	* The attributes excluded from the model's JSON form.
	*
	* @var array
	*/
	protected $hidden = array('password', 'remember_token');
	protected $primaryKey = 'user_id';
	protected $fillable = [
		'username', 
		'email', 
		'password',
		'user_type',
		'status',
		'registration_number', 
		'phone_number',
		'created_at', 
		'updated_at',
		'deleted_at'
	];
	
	const USER_TYPE_ADMIN = 1;
	const USER_TYPE_INSTRUCTOR = 2;
	const USER_TYPE_STUDENT = 3;
	
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;
	
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}
	
	public function createUser($username, $email, $password, $user_type, $status, $registration_number, $phone_number)
	{
		$user = new User();
		
		$user->username = $username;
		$user->email = $email;
		$user->password = $password;
		$user->user_type = $user_type;
		$user->status = $status;
		$user->registration_number = $registration_number;
		$user->phone_number = $phone_number;
		$user->created_at = Carbon::now();
		$user->updated_at = null;
		
		$user->save();
		
		return $user;
	}
}
