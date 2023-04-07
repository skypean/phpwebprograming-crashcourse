<?php

class User
{
    public int $id;
    public string $username;
    private string $upassword;
    public string $fullname;
    public int $urole;
    
    public function __construct(int $id, string $username, string $upassword, string $fullname, int $urole)
    {
        $this->id = $id;
        $this->username = $username;
        $this->upassword = $upassword;
        $this->fullname = $fullname;
        $this->urole = $urole;
    }

}

?>