<?php

class KelasModel
{

    private $table = 'course_members';
    private $db;

    public function __construct()
    {
        $this->db = new Database;    
    }

    public function count(){
        $this->db->query("SELECT * FROM $this->table");
        return count($this->db->get());
    }

    public function getAll()
    {
        $this->db->query("SELECT course_members.*, users.name, courses.course_name, courses.grade FROM course_members INNER JOIN users ON users.user_id = course_members.user_id INNER JOIN courses ON courses.course_id = course_members.course_id");
        return $this->db->get();
    }

    public function exists($user_id, $course_id){
        $this->db->query("SELECT * FROM $this->table WHERE user_id = $user_id AND course_id = $course_id");
        return !empty($this->db->first());
    }

    public function find($column, $id){
        $this->db->query("SELECT * FROM $this->table WHERE $column = $id");
        return $this->db->first();
    }

    public function store($data)
    {
        // $query = "INSERT INTO $this->table VALUES ('', :user_id, :course_id)";
        $query = "INSERT INTO $this->table VALUES (DEFAULT, :user_id, :course_id)";


        $this->db->query($query);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('course_id', $data['course_id']);
        

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete($id){
        $query = "DELETE FROM $this->table WHERE id = $id";
        $this->db->query($query);
        $this->db->execute();
    }
}