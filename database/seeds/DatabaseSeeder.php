<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CourseTableSeeder::class);
        $this->call(ClassTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(QualificationTableSeeder::class);
        $this->call(PayTableSeeder::class);
    }
}
class CourseTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('course')->insert([
            array('name' => 'Khóa học lập trình PHP', 'date_training' => 6, 'tuition' => '4.000.000 VNĐ'),
            array('name' => 'Khóa học lập trình JS', 'date_training' => 3, 'tuition' => '8.000.000 VNĐ'),
            array('name' => 'Khóa học lập trình JQ', 'date_training' => 8, 'tuition' => '5.000.000 VNĐ'),
            array('name' => 'Khóa học lập trình Java', 'date_training' => 5, 'tuition' => '2.000.000 VNĐ'),
            array('name' => 'Khóa học lập trình C#', 'date_training' => 8, 'tuition' => '1.000.000 VNĐ'),]);
    }
}
class ClassTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('class')->insert([
            array('name' => 'PHP_34', 'number' => 20, 'start_time' => '20.11.2019','teacher_id'=>1,'course_id'=>1,'schedule'=>' tối t2, tối t4'),
            array('name' => 'PHP_33', 'number' => 20, 'start_time' => '20.11.2019','teacher_id'=>2,'course_id'=>1,'schedule'=>' tối t3, tối t5'),
            array('name' => 'JS_34', 'number' => 20, 'start_time' => '20.11.2019','teacher_id'=>3,'course_id'=>2,'schedule'=>' tối t2, tối t4'),
            array('name' => 'JS_34', 'number' => 20, 'start_time' => '20.11.2019','teacher_id'=>4,'course_id'=>2,'schedule'=>' tối t3, tối t5'),

        ]);
    }
}

class TeacherTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('teacher')->insert([
            array('name' => 'Nguyễn Văn A', 'gender' => 0, 'birthday' => '10.9.1980','qualification_id'=>1,'phone'=>'0965847928','email'=>'nguyenvanA@gmail.com','address'=>'Hà Nội','img'=>''),
            array('name' => 'Nguyễn Thành Luân', 'gender' => 0, 'birthday' => '10.9.1980','qualification_id'=>1,'phone'=>'0965847928','email'=>'luan@gmail.com','address'=>'Quảng Ninh','img'=>''),
            array('name' => 'Nguyễn Thị C', 'gender' => 0, 'birthday' => '10.9.1980','qualification_id'=>0,'phone'=>'0965847928','email'=>'nguyenvanB@gmail.com','address'=>'Hà Nam','img'=>''),
            array('name' => 'Nguyễn thị D', 'gender' => 0, 'birthday' => '10.9.1980','qualification_id'=>0,'phone'=>'0965847928','email'=>'nguyenvanC@gmail.com','address'=>'Hà Nam','img'=>''),

        ]);
    }
}

class StudentTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->insert([
            array('name' => 'Nguyễn Văn A', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanA@gmail.com','address'=>'Hà Nội','img'=>''),
            array('name' => 'Nguyễn Thành Luân', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'luan@gmail.com','address'=>'Quảng Ninh','img'=>''),
            array('name' => 'Nguyễn Thị C', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanB@gmail.com','address'=>'Hà Nam','img'=>''),
            array('name' => 'Nguyễn thị D', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanC@gmail.com','address'=>'Hà Nam','img'=>''),
            array('name' => 'Nguyễn thị 1', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanC@gmail.com','address'=>'Hà Nam','img'=>''),
            array('name' => 'Nguyễn thị 2', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanC@gmail.com','address'=>'Hà Nam','img'=>''),
            array('name' => 'Nguyễn thị D4', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanC@gmail.com','address'=>'Hà Nam','img'=>''),
            array('name' => 'Nguyễn thị 5', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanC@gmail.com','address'=>'Hà Nam','img'=>''),
            array('name' => 'Nguyễn thị 6', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanC@gmail.com','address'=>'Hà Nam','img'=>''),
            array('name' => 'Nguyễn thị 7', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanC@gmail.com','address'=>'Hà Nam','img'=>''),
            array('name' => 'Nguyễn thị D8', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanC@gmail.com','address'=>'Hà Nam','img'=>''),
            array('name' => 'Nguyễn thị 9D', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanC@gmail.com','address'=>'Hà Nam','img'=>''),
            array('name' => 'Nguyễn thị 0D', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanC@gmail.com','address'=>'Hà Nam','img'=>''),
            array('name' => 'Nguyễn thị DD', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanC@gmail.com','address'=>'Hà Nam','img'=>''),
            array('name' => 'Nguyễn thị D', 'gender' => 0, 'birthday' => '10.9.1980','phone'=>'0965847928','email'=>'nguyenvanC@gmail.com','address'=>'Hà Nam','img'=>''),

        ]);
    }
}

class QualificationTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('qualification')->insert([
            array('majors' => 'CNTT', 'competent_units' => 'Đại học sư phạm'),
            array('majors' => 'Lập trình PHP', 'competent_units' => 'Đại học sư phạm'),
            array('majors' => 'Lập trình java', 'competent_units' => 'Đại học sư phạm'),
            array('majors' => 'CNTT JS', 'competent_units' => 'Đại học sư phạm'),

        ]);
    }
}

class PayTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('pay')->insert([
            array('student_id' => 1, 'class_id' => 1, 'tuition' => '4.000.000 VNĐ','sale'=>0,'pay'=>0,'pay1'=>0,'pay1'=>0,'pay2'=>0,'rest'=>4000000),
            array('student_id' => 2, 'class_id' => 1, 'tuition' => '4.000.000 VNĐ','sale'=>0,'pay'=>0,'pay1'=>0,'pay1'=>0,'pay2'=>0,'rest'=>4000000),
            array('student_id' => 3, 'class_id' => 1, 'tuition' => '4.000.000 VNĐ','sale'=>0,'pay'=>0,'pay1'=>0,'pay1'=>0,'pay2'=>0,'rest'=>4000000),
            array('student_id' => 4, 'class_id' => 1, 'tuition' => '4.000.000 VNĐ','sale'=>0,'pay'=>0,'pay1'=>0,'pay1'=>0,'pay2'=>0,'rest'=>4000000),
            array('student_id' => 5, 'class_id' => 1, 'tuition' => '4.000.000 VNĐ','sale'=>0,'pay'=>0,'pay1'=>0,'pay1'=>0,'pay2'=>0,'rest'=>4000000),
            array('student_id' => 7, 'class_id' => 1, 'tuition' => '4.000.000 VNĐ','sale'=>0,'pay'=>0,'pay1'=>0,'pay1'=>0,'pay2'=>0,'rest'=>4000000),
            array('student_id' => 8, 'class_id' => 1, 'tuition' => '4.000.000 VNĐ','sale'=>0,'pay'=>0,'pay1'=>0,'pay1'=>0,'pay2'=>0,'rest'=>4000000),
            array('student_id' => 3, 'class_id' => 1, 'tuition' => '4.000.000 VNĐ','sale'=>0,'pay'=>0,'pay1'=>0,'pay1'=>0,'pay2'=>0,'rest'=>4000000),
            array('student_id' => 3, 'class_id' => 1, 'tuition' => '4.000.000 VNĐ','sale'=>0,'pay'=>0,'pay1'=>0,'pay1'=>0,'pay2'=>0,'rest'=>4000000),
        ]);
    }
}
