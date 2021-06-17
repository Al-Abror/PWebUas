<?php

class UserModel
{

    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->get();
    }

    public function getAllMember(){
        $this->db->query("SELECT * FROM $this->table WHERE role = 'member'");
        return $this->db->get();
    }

    public function countMember(){
        $this->db->query("SELECT * FROM $this->table WHERE role = 'member'");
        return count($this->db->get());
    }

    public function find($id){
        $this->db->query("SELECT * FROM $this->table WHERE user_id = $id");
        return $this->db->first();
    }

    public function getUserByEmail($data)
    {
        $email = $data['email'];
        $query = "SELECT * FROM $this->table WHERE email = '$email'";
        $this->db->query($query);
        $this->db->execute();
        
        return $this->db->first();
    }

    public function getUserByUsername($data)
    {
        $username = $data['username'];
        $query = "SELECT * FROM $this->table WHERE username = '$username'";
        $this->db->query($query);
        $this->db->execute();

        return $this->db->first();
    }

    public function storeUser($data)
    {
        // $query = "INSERT INTO $this->table VALUES ('', :name, :username, :email, :password, :role, :join_at)";
        $query = "INSERT INTO $this->table (name, username, email, password, role, join_at) VALUES (:name, :username, :email, :password, :role, :join_at)";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind('role', 'member');
        $this->db->bind('join_at', date("Y-m-d h:i:s"));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update($data, $id){
        $query = "UPDATE $this->table SET name=:name, username=:username, email=:email WHERE user_id = $id";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);

        $this->db->execute();
    }

    public function delete($id){
        $query = "DELETE FROM $this->table WHERE user_id = $id";
        $this->db->query($query);
        $this->db->execute();
    }
}
