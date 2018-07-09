<?php


class DB {
    protected $localhost;
    protected $login;
    protected $password;
    protected $dbName;
    public function __construct($localhost, $login, $password, $dbName) {
        $this->localhost = $localhost;
        $this->login = $login;
        $this->password = $password;
        $this->dbName = $dbName;
    }
    public function connection()
    {
        return mysqli_connect($this->localhost, $this->login, $this->password, $this->dbName);
    }
    public function sqlQuery($query)
    {
        return mysqli_query(self::connection(), $query);
    }
}
