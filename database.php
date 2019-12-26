<?php
/**
 * Created by PhpStorm.
 * User: FR
 * Date: 12/25/2019
 * Time: 6:42 PM
 */

class Database {

    public $host = "localhost";

    public $user = "root";

    public $password ="";

    public $database = "simple_shop";

    public $connection;

    //Phương thức khởi tạo
    public function __construct()
    {
        $this->connection = $this->connectDatabase();
    }
    /*Phương thức kết nối đến cơ sở dữ liệu*/

    public function connectDatabase() {

        $connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $connection;
    }

    // Phương thức chạy câu truy vấn sql
    public function runQuery($sql) {
        $data = array();
        $result = mysqli_query($this->connection, $sql);

        while ($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }

        return $data;
    }
    // Phương thức đếm số bản ghi trong câu lệnh query
    public function numRows($sql) {
        $result = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($result);

        return $count;
    }
}


?>