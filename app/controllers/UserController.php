<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class UserController extends BaseController
{	
	public function index()
	{
		$user = new User();
		$search = Input::get('search');
		
		if ($search != '') {
			$data = $user->filter($search);
			
			$totalUsers = $data['totalUsers'];
			$users = $data['users'];
		} else {
			$data = $user->showAll();
			$totalUsers = $data['totalUsers'];
			$users = $data['users'];
		}

		$data = compact('users', 'totalUsers', 'search');

		return View::make('User/view')->with($data);
	}
	
	public function create()
	{	
		$pageName = "Create User";			
		$url = url('/user/create');
		$ADMIN = User::USER_TYPE_ADMIN;
		$INSTRUCTOR = User::USER_TYPE_INSTRUCTOR;
		$STUDENT = User::USER_TYPE_STUDENT;
		$ACTIVE = User::STATUS_ACTIVE;
		$INACTIVE = User::STATUS_INACTIVE;
		$data = compact('url', 'pageName', 'type', 'ADMIN', 'INSTRUCTOR', 'STUDENT', 'ACTIVE', 'INACTIVE');
		
		return View::make('User.create')->with($data);
	}
	
	public function store()
	{
		$validator = Validator::make(Input::all(), [
			'username' => 'required|min:3|max:20',
			'email' => 'required|email',
			'password' => 'required|min:4',
			'userType' => 'required|in:1,2,3',
			'status' => 'required|in:0,1',
			'registrationNumber' => 'required|min:3',
			'phoneNumber' => 'required|numeric|digits_between:10,15',
			'firstName' => 'required|min:2|max:50',
			'middleName' => 'sometimes|max:50',
			'lastName' => 'required|min:2|max:50'
		], [
			'required' => 'The :attribute field is required.',
			'unique' => 'This :attribute is already taken.',
			'min' => 'The :attribute must be at least :min characters.',
			'in' => 'Please select a valid :attribute.',
			'alpha_num' => 'The :attribute may only contain letters and numbers.'
		]);
		
		if ($validator->fails()) {
			return Redirect::back()
			->withErrors($validator)
			->withInput(Input::except('password'));
		}
		$user = new User();
		
		$username = Input::get('username');
		$email = Input::get('email');
		$password = Input::get('password');
		$user_type = Input::get('userType');
		$status = Input::get('status');
		$registration_number = Input::get('registrationNumber');
		$phone_number = Input::get('phoneNumber');
		$first_name = Input::get('firstName');
		$middle_name = Input::get('middleName');
		$last_name = Input::get('lastName');
		
		$user->createUser($username, $email, $password, $user_type, $status, $registration_number, $phone_number);
	}
	
	public function show($id)
	{
		// Show single item
	}
	
	public function edit($id)
	{
		$user = new User();
		$users = $user->edit($id);
		$pageName = "Edit User";
		$url = url('/user/update/' . $id);
		if (!$users) {
			Session::flash('message', 'User not found');
			return Redirect::to('user/view');
		}
		$data = compact('users', 'url', 'pageName');
		return View::make('User.update')->with($data);
	}
	
	public function update($id)
	{
		$user = new User();
		$users = $user->edit($id);
		
		if (!$users) {
			Session::flash('message', 'User not found');
			return Redirect::back();
		}
		
		
		$validator = Validator::make(Input::all(), [
			'userType' => 'required|in:1,2,3',
			'status' => 'required|in:0,1',
			'phoneNumber' => 'required|numeric|digits_between:10,15'
		], [
			'required' => 'The :attribute field is required.',
			'min' => 'The :attribute must be at least :min characters.',
			'in' => 'Please select a valid :attribute.'
		]);
		
		if ($validator->fails()) {
			return Redirect::back()
			->withErrors($validator);
		}
		
		$update = $user->updateUser(Input::all(), $id);
		
		if ($update) {
			Session::flash('message', 'User updated successfully');
			return Redirect::to('user/view');
		} else {
			Session::flash('message', 'Failed to update user');
			return Redirect::back();
		}
	}
	
	public function destroy($id)
	{
		$user = new User();
		$users = $user->edit($id);
		
		if (!$users) {
			Session::flash('message', 'User not found');
			return Redirect::back();
		}
		$delete = $user->deleteUser($id);
		
		if (!$delete) {
			Session::flash('message', 'Failed to delete user');
			return Redirect::back();
		} else{
			Session::flash('message', 'User deleted successfully');
			return Redirect::to('user/view');
		}		
	}
	
	public function status($id)
	{
		$user = new User();
		$users = $user->edit($id);
		
		if (!$users) {
			Session::flash('message', 'User not found');
			return Redirect::back();
		}
		$status = $user->statusUpdate($id);
		
		if (!$status) {
			Session::flash('message', 'Failed to update user status');
			return Redirect::back();
		} else {
			Session::flash('message', 'User activated successfully');
			return Redirect::to('user/view');
		}
	}
}