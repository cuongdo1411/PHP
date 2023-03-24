<?php
    class page{
        // phuong thuc tinh ra so trang
        function findPage($count,$limit){
            //$page=19/8 du 3 khac 0 2+1=3
            $page=(($count%$limit)==0)?$count/$limit:floor($count/$limit)+1;
            return $page;
        }

        // phuong thuc tinh start, trang hien tai current_page=http://localhost/index/php?action=sanpham
        function findStart($limit)
        {
            if(!isset($_GET['page']) || $_GET['page']==1)
            {
                $start = 0;
                $_GET['page'] = 1;
            }
            else // co ton tai trang hien tai
            {
                $start = ($_GET['page'] - 1)*$limit;
            }
            return $start;
        }
    }
?>