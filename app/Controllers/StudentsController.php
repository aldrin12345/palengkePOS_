<?php

namespace App\Controllers;

use App\Models\StudentsModel;

class StudentsController extends BaseController
{
    public function index()
    {   $fetchStudent = new StudentsModel();
        $data['students'] = $fetchStudent->findAll();
        return view('students/list',$data);
    }
    public function createStudent()
    {   
        $data['studentNumber'] = '20000_'.uniqid();
        return view('students/add',$data);
    }
    public function storeStudent()
    {
        $insertStudents = new StudentsModel();

        if($img = $this->request->getFile('studentProfile')){
            if($img->isValid() && !$img->hasMoved()){
                $imageName = $img->getrandomName();
                $img->move('uploads/',$imageName);
            }
        }

        $data = array(
            'student_name' => $this->request->getpost('studentName'),
            'student_id' => $this->request->getpost('studentNum'),
            'student_section' => $this->request->getpost('studentSection'),
            'student_course' => $this->request->getpost('studentCourse'),
            'student_batch' => $this->request->getpost('studentBatch'),
            'student_grade_level' => $this->request->getpost('studentLevel'),
            'student_profile' => $imageName,
            
        );

        $insertStudents->insert($data);

        return redirect()->to('/students')->with('success','Student Added Successfully!');
    }
    public function editStudent($id)
    {
        return view('students/edit');
    }
    public function updateStudent($id)
    {
        // return view('students/edit');
    }public function deleteStudent($id)
    {
        // return view('students/edit');
    }
    public function test2()
    {
        $subjects = new StudentsModel();
        $data['subjects'] =  $subjects->getdata();
        return view('test',$data);
    }
}
