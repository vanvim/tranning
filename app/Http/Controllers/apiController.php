<?php

namespace App\Http\Controllers;
use App\Model\Course;
use Illuminate\Http\Request;

class apiController extends Controller
{
    public function __construct(Course $course)
    {
        $this->course = $course;
    }
    public function index(){
        $items = $this->course->get()->toArray();
        return json_encode(['status' => 200, 'message' => 'success', 'data' => $items]);
    }
}
