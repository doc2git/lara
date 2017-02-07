<?php namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Container\Container;
class WelcomeController
{
    public function index()
    {
        //return '<h1>控制器成功！</h1>';
        $student = Student::first();
        $data = $student->getAttributes();
        //return "学生id=".$data['id']."; 学生name=".$data['name']."; 学生age=".$data['age'];
        $app = Container::getInstance();
        $factory = $app->make('view');
        return $factory->make('welcome')->with('data', $data);
    }
}
