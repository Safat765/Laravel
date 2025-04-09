<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Department extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departments';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'department_id';
	protected $fillable = [
		'name',
        'createdBy'
	];

    public function createDepartment($name)
	{
		$department = new Department();
		
		$department->name = $name;
		$department->createdBy = 11;
		$department->created_at = Carbon::now('Asia/Dhaka')->format('h:i A');
		$department->updated_at = "";
		
		if ($department->save()) {
			return $department;
		}
		
		return false;
	}

    public function filter($search)
	{
		$departmentCount = Department::where('name', 'LIKE', '%' . $search . '%')
		->orWhere('email', 'created_by', '%' . $search . '%');
		
		$totalDepartment = $departmentCount->count();
		$department = $departmentCount->paginate(5);
		
		$data = compact('department', 'totalDepartment');
		return $data;
	}

    public function showAll()
	{
		$departmentCount = Department::all();
		$totalDepartment = $departmentCount->count();
		$department = Department::paginate(5);		
		$data = compact('department', 'totalDepartment');

		return $data;
	}

    public function edit($id)
	{
		$department = Department::find($id);
		return $department;
	}
	
	public function updateDepartment(array $data, $department_id)
	{		
		$department = $this->edit($department_id);
		
		if (!$department) {
			return false;
		}
		$department->name = $data['name'];
		$department->updated_at = Carbon::now('Asia/Dhaka')->format('h:i A');;
		$department->save();
		
		return $department;
	}
	
	public function deleteDepartment($id)
	{
		$department = $this->edit($id);
		
		if (!$department) {
			return false;
		}
		
		$department->delete();
		
		return $department;
	}

}