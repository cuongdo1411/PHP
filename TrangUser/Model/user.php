<?php
class user
{
        function __construct()
        {}
        //phương thức thêm vào database
        function InsertUser($tenkh, $user, $matkhau, $email, $diachi, $dt)
        {
            $db = new connect();
            $query = "insert into khachhang(makh,tenkh,username,matkhau,email,diachi,sodienthoai)
                    values(NULL,'$tenkh','$user','$matkhau','$email','$diachi','$dt')";
            // ai thực thi query => exec thực thi những câu insert, delete, update
            // echo $query;
            $db->exec($query);
        }
        // Viết phương thức đăng nhập.
        function loginUser($username, $matkhau)
        {
            $db = new connect();
            $select = "select * from khachhang where username='$username' and matkhau='$matkhau'";
            echo $select;
            $result = $db->getList($select);
            $set = $result->fetch();
            return $set;
        }
         // Phương thưc thêm dữ liệu nhập vào database
        function insertComment($mahh,$makh,$noidung){
            $db = new connect();
            $date = new DateTime("now");
            $ngaybl = $date->format("Y-m-d");
            $query = "insert into binhluan(mabl,mahh,makh,ngaybl,noidung)
            values(null,'$mahh','$makh','$ngaybl','$noidung')";
            $db->exec($query);
        }

        // Phương thức đếm số lượt bình luận mã hàng hóa
        function countCommentHH($mahh){
            $db = new connect();
            $select = "select count(mabl) from binhluan where mahh = $mahh";
            $result = $db->getInstance($select);
            return $result[0];
        }

        // Phương thức hiển thị những nội dung comment
        function showComment($mahh){
            $db = new connect();
            $select = "select a.noidung, a.ngaybl, b.username from binhluan a inner join khachhang b on a.makh=b.makh where mahh=$mahh";
            $result=$db->getList($select);
            return $result;
        }

    }
?>