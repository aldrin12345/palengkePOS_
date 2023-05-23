<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_students';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['student_name', 'student_id', 'student_section', 'student_course', 'student_batch', 'student_grade_level', 'student_profile'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getdata(){
        $subjects = [
            ['subject' =>'html','abbr' =>'hyper text markup language'],
            ['subject' =>'css','abbr' =>'cascading style sheet'],
            ['subject' =>'json','abbr' =>'javascript object notation'],
        ];
        
        $db      = \Config\Database::connect();
        $query = $db->query("SELECT * FROM users_tbl where user_id=1;");
        $result = $query->getResult();

        return $result;
    }
}
