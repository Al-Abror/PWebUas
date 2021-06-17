<?php

class CourseModel
{

    private $table = 'courses';
    private $primaryKey = 'course_id';
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
        $this->db->query("SELECT * FROM $this->table ORDER BY $this->primaryKey DESC");
        return $this->db->get();
    }

    public function mineCourse($id){
        $this->db->query("SELECT * FROM $this->table WHERE course_id IN ($id)");
        return $this->db->get();
    }

    public function find($id){
        $this->db->query("SELECT * FROM $this->table WHERE $this->primaryKey = $id");
        return $this->db->first();
    }

    public function store($data)
    {
        // $query = "INSERT INTO $this->table VALUES ('', :course_name, :description, :grade)";
        $query = "INSERT INTO $this->table VALUES (DEFAULT, :course_name, :description, :grade)";


        $this->db->query($query);
        $this->db->bind('course_name', $data['course_name']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('grade', $data['grade']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update($data, $id){
        $query = "UPDATE $this->table SET course_name=:course_name, description=:description, grade=:grade WHERE $this->primaryKey = $id";
        $this->db->query($query);
        $this->db->bind('course_name', $data['course_name']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('grade', $data['grade']);

        $this->db->execute();
    }

    public function delete($id){
        $query = "DELETE FROM $this->table WHERE $this->primaryKey = $id";
        $this->db->query($query);
        $this->db->execute();
    }
}