<?php

namespace App\Http\Controllers;

use App\Model\Qualification;
use App\Model\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct(Teacher $teacher, Qualification $qualification)
    {
        $this->teacher = $teacher;
        $this->qualification = $qualification;
    }
    public function index(){
        $items = $this->teacher->get()->toArray();
        foreach ($items as $key => $item) {
            $qualification = $this->qualification->select('majors')->find($item['qualification_id']);
            $items[$key]['qualification'] = $qualification['majors'];
        }
        return json_encode(['status' => 200, 'message' => 'success', 'data' => $items]);
    }
    public function addTeacher(Request $request){
        $this->teacher->name = $request->name;
        $this->teacher->gender = $request->gender;
        $this->teacher->birthday = $request->birthday;
        $this->teacher->qualification_id = $request->qualification_id;
        $this->teacher->phone = $request->phone;
        $this->teacher->address = $request->address;
        $this->teacher->email = $request->email;
        $this->teacher->img = '';
        $this->teacher->save();

        return json_encode(['status' => 200, 'message' => 'success']);
    }
}
