<?php 

class CourseMemberModel {
    private $table = 'course_members';
    private $db;

    public function __construct()
    {
        $this->db = new Database;    
    }

    public function getByUser($id){
        $this->db->query("SELECT course_id FROM $this->table WHERE user_id = $id");
        return $this->db->get();
    }
}