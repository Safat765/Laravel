<?php
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
class DepartmentController extends BaseController {
				
	public function index()
	{
		$department = new Department();
		$search = Input::get('search');
		
		if ($search != '') {
			$data = $department->filter($search);
			
			$totalUsers = $data['totalUsers'];
			$users = $data['users'];
		} else {
			$data = $department->showAll();
			$totalUsers = $data['totalUsers'];
			$users = $data['users'];
		}

		$data = compact('users', 'totalUsers', 'search');

		return View::make('Department.index')->with($data);
	}
				
	public function create()
	{
		$pageName = "Create Department";			
		$url = url('/departments');
		$data = compact('url', 'pageName');
		
		return View::make('Department/create')->with($data);
	}
				
	public function store()
	{
		$validator = Validator::make(Input::all(), [
			'name' => 'required|min:3'
		], [
			'required' => 'The Department field is required.',
			'min' => 'The Department must be at least :min characters.'
		]);
		
		if ($validator->fails()) {
			return Redirect::back()
			->withErrors($validator);
		}
		$department = new Department();
		$name = Input::get('name');
		$department->createDepartment($name);
		
		// if ($department) {
		// 	Session::flash('success', 'User created successfully');
		// 	return Redirect::to('user/view');
		// } else {
		// 	Session::flash('message', 'Failed to create user');
		// 	return Redirect::back();
		// }
	}
				
	public function show($id)
	{
		echo "Hello show" . $id;
	}
				
	public function edit($id)
	{
		echo "Hello edit" . $id;
	}
				
	public function update($id)
	{
		echo "Hello update" . $id;
	}
				
	public function destroy($id)
	{
		echo "Hello destroy " . $id;
	}
}