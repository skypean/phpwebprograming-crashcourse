<?php

namespace App\DAO;

use App\DAO\DAO;

class UserDAO extends DAO{
    public function getUser(int $uid){
        // $query = "SELECT * FROM users WHERE id='$uid'";
        $query = "SELECT * FROM users WHERE id=:uid";
        // $uid = 2' AND SUBSTRING(upassword,1,1)='1
        // $query = "SELECT * FROM users WHERE id='2' AND SUBSTRING(upassword,4,1)='1'"

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':uid',$uid);
        // SELECT * FROM users WHERE id=1

        $stmt->execute();

        return $stmt->fetch();
    }


    public function login(string $username, string $upassword){
        $query = "SELECT * FROM users WHERE username=:username AND upassword=:upassword";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':upassword', $upassword);
        // $stmt->bindValue(':upassword', hash('sha256', $upassword));

        $stmt->execute();

        return $stmt->fetch() !== false;
    }

    public function getAll(){
        $query = "SELECT * FROM users";

        return $this->db->query($query)->fetchAll();
    }
    
}