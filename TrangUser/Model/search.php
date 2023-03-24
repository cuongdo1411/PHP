<?php
    class timkiem {
        // tim kiem
        public function getListHangHoaTimKiem($keyword){
            $db = new connect();
            $select = 'select*from hanghoa where tenhh like %'.$keyword.'%';
            $results = $db->getList($select);
            return $results;
        }
    }
?>