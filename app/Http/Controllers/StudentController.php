<?php

namespace App\Http\Controllers;

use App\Model\ClassRoom;
use App\Model\Student;
use App\Model\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(Student $student,Teacher $teacher,ClassRoom $class)
    {
        $this->student = $student;
        $this->teacher = $teacher;
        $this->class = $class;
    }
    public function index(){
        $items = $this->student->get()->toArray();
        foreach ($items as $key => $item){
            $class =  $this->class->select('name')->find($item['class_id'])->toArray();
            $items[$key]['class'] =$class['name'];
        }
        return json_encode(['status' => 200, 'message' => 'success', 'data' => $items]);
    }
    public function addStudent(Request $request){
//        dd($request);
//        if($request->get('img'))
//        {
//            $image = $request->get('img');
//            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
//            $destinationPath = './img';
//            $request->get('img')->move($destinationPath, $name);
//        }
        $this->student->name = $request->name;
        $this->student->gender = $request->gender;
        $this->student->birthday = $request->birthday;
        $this->student->class_id = $request->class_id;
        $this->student->phone = $request->phone;
        $this->student->email = $request->email;
        $this->student->address = $request->address;
//        $this->student->img = $name;
        $this->student->img = "";

        $this->student->save();

        return json_encode(['status' => 200, 'message' => 'success']);
    }
}
