<?php
    class connect{
        // thuộc tính
        var $db = null;

        // hàm tạo -> thực hiện công việc connect với database bằng PDB (dsn, user, pass, array, ...)
        public function __construct(){
            $dsn = 'mysql:host=localhost; dbname=didongshop';
            $user = 'root';
            $pass = ''; //Mặc định của MAN là root, của XAM là bỏ trống
            try{
                $this->db = new PDO ($dsn, $user, $pass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")); // Đối tượng $thisdb được tạo ra từ PDO; dấu :: là phương thức tĩnh(public static)
                echo "";
            }catch(Throwable $th){
                //Throw $th;
                echo "Thất bại";
            }
        }

        // Phương thức
        // Phương thức trả về nhiều đối tượng khi thực thi truy vấn
        public function getList($select){
            // query thực thi câu select, mà query thuộc về phương thức của PDO
            $result = $this->db->query($select);
            return $result;
        }

        //phương thức trả về 1 object
        public function getInstance($select){
            $result = $this -> db ->query($select);
            $result = $result->fetch();
            return $result;
        }
        //phương thức thực thi câu lệnh insert, update, delete
        public function exec($query)
        {
            $result = $this->db->exec($query);
            return $result;
        }
    }
?>