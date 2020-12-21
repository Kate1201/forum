<?php

class Database
{
    private $link;

    private function connect()
    {
        $this->link = mysqli_connect("localhost", "root", "vertrigo", "forum");
        mysqli_set_charset($this->link, 'utf8');
        return $this->link;
    }

    public function getAllRows($table)
    {
        $this->connect();
        $sql = "SELECT * FROM " . $table;
        $result = mysqli_query($this->link, $sql);
        $rows = mysqli_num_rows($result);
        $select = array();
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result);
            array_push($select, $row);
        }
        return $select;
    }

    public function getAllComments($id)
    {
        $this->connect();
        $sql = "SELECT comments.id, comments.author, comments.post_id, comments.body, comments.date, users.username FROM comments LEFT JOIN users on comments.author = users.id WHERE comments.post_id = $id";
        $result = mysqli_query($this->link, $sql);
        $rows = mysqli_num_rows($result);
        $select = array();
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result);
            array_push($select, $row);
        }
        return $select;
    }
    public function getPost($id)
    {
        $this->connect();
        $sql = "SELECT post.id, post.theme_id, post.author, post.body, post.date, post.name, users.username FROM post LEFT JOIN users on post.author = users.id WHERE post.id = $id";
        $result = mysqli_query($this->link, $sql);
        $rows = mysqli_num_rows($result);
        $select = array();
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result);
            array_push($select, $row);
        }
        return $select;
    }

    public function getRow($table, $columns, $condition, $condition_value)
    {
        $this->connect();
        $sql = "SELECT " . $columns . " FROM " . $table . " WHERE " . $condition . "=" . "'" . $condition_value . "'";
        $result = mysqli_query($this->link, $sql);
        $select = mysqli_fetch_row($result);
        mysqli_error($this->link);
        return $select;

    }

    public function getRows($table, $condition, $condition_value)
    {
        $this->connect();

        $sql = "SELECT * FROM " . $table . " WHERE " . $condition . "=" . "'" . $condition_value . "'";
        $result = mysqli_query($this->link, $sql);
        $rows = mysqli_num_rows($result);
        $select = array();
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result);
            array_push($select, $row);
        }
        mysqli_error($this->link);
        return $select;

    }

    public function insertRow($table, $data)
    {
        $this->connect();
        $fields = "";
        $values = "";
        foreach ($data as $f => $v) {
            $fields .= "`$f`,";
            $values .= (is_numeric($v) && (intval($v) == $v)) ? $v . "," : "'$v',";
        }
        $fields = substr($fields, 0, -1);
        $values = substr($values, 0, -1);

        $insert = "INSERT INTO " . $table . " (" . $fields . ")" . " VALUES " . "({$values}) ";
        if (mysqli_query($this->link, $insert)) {
            $last_id = $this->link->insert_id;
        } else {
        }
        return $last_id;
    }
}


?>