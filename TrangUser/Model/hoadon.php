<?php
    class hoadon{
        function __construct(){}
            // viết phương thức thực hiện insert vào bảng hóa đơn trước
            // sau đó trả về mã số hóa
            public function InsertOrder($makh)
            {
                $db = new connect();
                $date = new DateTime("now");
                $datecreate=$date->format("Y-m-d");
                $query = "insert into hoadon(`makh`,`ngaydat`,`tongtien`) values ('$makh','$datecreate',0)";
                $db->exec($query);
                // sau khi insert xong, lấy ra mã số hóa đơn
                $int=$db->getInstance("select masohd from hoadon order by masohd desc limit 1");
                return $int[0]; // trả ra mã số hóa đơn
            }
            // viết phương thức insert vào bảng chi tiết hóa đơn.
            function insertOrderDetail($masohd,$mahh,$soluong,$mausac,$thanhtien)
            {
                $db = new connect();
                $query = "insert into 
                chitiethoadon(`masohd`,`mahh`,`soluongmua`,`mausac`,`thanhtien`,`tinhtrang`) 
                values('$masohd','$mahh','$soluong','$mausac','$thanhtien',0)";
                // echo $query;
                $db->exec($query);
            }
            // viết phương thức update tổng tiền vào bảng hóa đơn
            function updateOrderTotal($sohd,$tongtien)
            {
                $db = new connect();
                $query ="update hoadon set tongtien=$tongtien where masohd=$sohd";
                $db->exec($query);
            }
            // phương thức lấy từ bảng hóa đơn và bảng khách hàng
            function getOrder($sohdid)
            {
                $db = new connect();
                $select = "select b.masohd, a.tenkh, a.diachi, a.sodienthoai, b.ngaydat
                            from khachhang a INNER join hoadon b on a.makh=b.makh 
                            where b.masohd=$sohdid";
                $result=$db->getInstance($select);
                return $result;
            }
            // phương thức lấy ra từ bảng hàng hóa và bảng chi tiết hóa đơn
            function getOrderDetail($sohdid)
            {
                $db = new connect();
                $select = "select a.tenhh, a.dongia, b.mausac, b.soluongmua, b.thanhtien from hanghoa a
                INNER join chitiethoadon b on a.mahh=b.mahh where masohd=$sohdid";
                $result=$db->getList($select);
                return $result;
            }
        }