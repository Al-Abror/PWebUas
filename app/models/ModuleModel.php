<?php

class ModuleModel
{

    private $table = 'modules';
    private $primaryKey = 'module_id';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function count()
    {
        $this->db->query("SELECT * FROM $this->table");
        return count($this->db->get());
    }

    public function getModuleByCourse($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE course_id = $id");
        return $this->db->get();
    }

    public function getAll()
    {
        $this->db->query("SELECT modules.*, courses.course_name FROM $this->table INNER JOIN courses ON courses.course_id = modules.course_id ORDER BY $this->primaryKey DESC");
        return $this->db->get();
    }

    public function mineCourse($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE course_id IN ($id)");
        return $this->db->get();
    }

    public function find($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE $this->primaryKey = $id");
        return $this->db->first();
    }

    public function store($data)
    {
        // $query = "INSERT INTO $this->table VALUES ('', :module_name, :description, :module_file, :course_id)";
        $query = "INSERT INTO $this->table VALUES (DEFAULT, :module_name, :description, :module_file, :course_id)";


        $files = $_FILES['module_file']['tmp_name'];
        $uploadDir = BASE_PATH . '/assets/uploads/modules/';
        $isUpload = move_uploaded_file($files, $uploadDir . $data['module_name'] . '.pdf');

        if ($isUpload) {
            $this->db->query($query);
            $this->db->bind('module_name', $data['module_name']);
            $this->db->bind('description', $data['description']);
            $this->db->bind('module_file', $data['module_name'] . '.pdf');
            $this->db->bind('course_id', $data['course_id']);

            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function update($data, $id)
    {
        if ($_FILES['module_file']['size']) {
            $query = "UPDATE $this->table SET module_name=:module_name, description=:description, module_file=:module_file, course_id=:course_id WHERE $this->primaryKey = $id";
            $files = $_FILES['module_file']['tmp_name'];
            $uploadDir = BASE_PATH . '/assets/uploads/modules/';
            $isUpload = move_uploaded_file($files, $uploadDir . $data['module_name'] . '.pdf');

            if ($isUpload) {
                $this->db->query($query);
                $this->db->bind('module_name', $data['module_name']);
                $this->db->bind('module_file', $data['module_name'] . '.pdf');
                $this->db->bind('description', $data['description']);
                $this->db->bind('course_id', $data['course_id']);
                $this->db->execute();
            }
        } else {
            $query = "UPDATE $this->table SET module_name=:module_name, description=:description, course_id=:course_id WHERE $this->primaryKey = $id";
            $this->db->query($query);
            $this->db->bind('module_name', $data['module_name']);
            $this->db->bind('description', $data['description']);
            $this->db->bind('course_id', $data['course_id']);
            $this->db->execute();
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE $this->primaryKey = $id";
        $this->db->query($query);
        $this->db->execute();
    }
}
