<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
		
class UserController extends BaseController {
				
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
		// p($data['search']);
		return View::make('User/userView')->with($data);
	}
				
	public function create()
	{	
		$pageName = "Create User";			
		$url = url('/user/create');
		$data = compact('url', 'pageName');
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
			'firstName' => 'required|alpha|min:2|max:50',
			'middleName' => 'sometimes|alpha|max:50',
			'lastName' => 'required|alpha|min:2|max:50'
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
		
		p(Input::all());
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
		// Show edit form
	}
				
	public function update($id)
	{
		// Handle update
	}
				
	public function destroy($id)
	{
		// Handle deletion
	}
}