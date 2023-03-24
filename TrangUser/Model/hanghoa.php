<?php
    class hanghoa{
        // thuộc tính
        // hàm tạo
        public function __construct(){}
        // thực hiện phương thức lấy 12 sản phẩm về để đổ lên View
        public function getHangHoaNew(){
            //B1: Kết nối được với databases
            $db = new connect();
            //B2: Dùng select để truy vấn
            $select = "select * from hanghoa WHERE giagiam>1 AND nhom = 2";
            $result = $db->getList($select);
            return $result; // đây chính là bảng lấy về 20 sản phẩm
        }

        public function getHangHoaIphone(){
            $db = new connect();
            //B2: Dùng select để truy vấn
            $select = "select * from hanghoa WHERE giagiam>0 AND nhom=1";
            $result = $db->getList($select);
            return $result; // đây chính là bảng lấy về các sản phẩm Iphone
        }

        public function getHangHoaIpad(){
            $db = new connect();
            //B2: Dùng select để truy vấn
            $select = "select * from hanghoa WHERE giagiam>0 AND nhom=2";
            $result = $db->getList($select);
            return $result; // đây chính là bảng lấy về các sản phẩm Ipad
        }

        public function getHangHoaWatch(){
            $db = new connect();
            //B2: Dùng select để truy vấn
            $select = "select * from hanghoa WHERE giagiam>0 AND nhom=3";
            $result = $db->getList($select);
            return $result; // đây chính là bảng lấy về các sản phẩm Ipad
        }

        public function getHangHoaAll(){
            $db = new connect();
            //B2: Dùng select để truy vấn
            $select = "select * from hanghoa";
            $result = $db->getList($select);
            return $result; // đây chính là bảng lấy về các sản phẩm Ipad
        }

        public function getHangHoaId($id){
            //B1: kết nối với databases
            $db = new connect();
            //B2: Dùng select để truy vấn
            $select = "select * from hanghoa WHERE mahh=$id";
            $result = $db->getInstance($select);
            return $result; // đây chính là bảng lấy về 12 sản phẩm
        }

        public function getHangHoaNhom($nhom){
            $db = new connect();
            $select = "select  distinct mausac from hanghoa Where nhom=".$nhom;
            $result = $db->getList($select);
            return $result; // đây chính là bảng lấy về 12 sản phẩm
        }

        public function getHangHoaNhom1($nhom){
            $db = new connect();
            $select = "select distinct size from hanghoa Where Nhom=$nhom ORDER by size ";
            $result = $db->getList($select);
            return $result; // đây chính là bảng lấy về 12 sản phẩm
        }

        public function getHangHoaAllSale(){
            //B1: kết nối với databases
            $db = new connect();
            //B2: Dùng select để truy vấn
            $select = "select * from hanghoa WHERE giagiam";
            $result = $db->getList($select);
            return $result; // đây chính là bảng lấy về 12 sản phẩm
        }

        // phan trang
        public function getListHangHoaAllPage($start,$limit) //8,8
        {
            $db = new connect();
            $select = "select * from hanghoa limit ".$start.",".$limit;
            $results = $db->getList($select);
            return $results;
        }
        
        public function getListHangHoaByPriceAsc($start,$limit) //8,8
        {
            $db = new connect();
            $select = "SELECT * FROM hanghoa ORDER BY dongia ASC limit ".$start.",".$limit;
            $results = $db->getList($select);
            return $results;
        }

        public function getListHangHoaByPriceDesc($start,$limit) //8,8
        {
            $db = new connect();
            $select = "SELECT * FROM hanghoa ORDER BY dongia DESC limit ".$start.",".$limit;
            $results = $db->getList($select);
            return $results;
        }

        public function getListHangHoaByCategory($start,$limit) //8,8
        {
            $db = new connect();
            $select = "SELECT * FROM hanghoa ORDER BY tenloai ASC limit ".$start.",".$limit;
            $results = $db->getList($select);
            return $results;
        }
    }
?>