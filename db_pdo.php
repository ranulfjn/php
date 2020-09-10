<?php

// class for DB to connect for ant sql servers

class db_pdo
{
    public $db_host = '127.0.0.1';
    public $db_user_name = 'electric_scooter_web_site';
    public $db_user_pw = 'qqwwee';
    public $db_name = 'electric_scooter';
    public $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user_name, $this->db_user_pw);
        } catch (PDOException $e) {
            echo 'Error!: '.$e->getMessage().'<br/>';
            die();
        }

        //echo'Connected to DB!!!';
    }

    public function query($sql_str)
    {
        try {
            $result = $this->connection->query($sql_str);
            // var_dump($result);
            // if (!$result) {
            //     die('SQL query error');
            // }
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
            die();
        }

        return $result;
    }

    public function querySelect($sql_str)
    {
        $records = $this->query($sql_str)->fetchAll(PDO::FETCH_ASSOC);

        return $records;
    }

    public function table($table_name)
    {
        return  $this->querySelect('SELECT * from '.$table_name); // return the whole table from db
    }

    public function disconnect()
    {
        $this->connection = null;
    }
}
