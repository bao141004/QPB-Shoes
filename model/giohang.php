<?php
//load all giỏ hàng theo id user
function loadall_giohang($IdTaiKhoan) {
    $sql = "SELECT b.Gia * a.SoLuongSp AS tong_gia,
    SUM(b.Gia * a.SoLuongSp) OVER () AS tong_bill,
    SUM(a.SoLuongSp ) OVER () AS tong_sl,a.*,b.*,c.*
    FROM giohang AS a JOIN sanpham AS b ON a.IdSanPham = b.IdSanPham
    JOIN taikhoan AS c ON c.IdTaiKhoan = a.IdTaiKhoan
    WHERE c.IdTaiKhoan =".$IdTaiKhoan;
    $result = pdo_query($sql);
    return $result;
}
// thêm sản phẩm vào giỏ hàng

function insert_giohang($IdSanPham, $IdTaiKhoan) {
    $sql = "INSERT into giohang (`IdSanPham`,`IdTaiKhoan`) 
    VALUES ('$IdSanPham','$IdTaiKhoan')";
    $result = pdo_query($sql);
    return $result;
}
//xóa sản phẩm từ giỏ hàng
function delete_sp_giohang($IdSanPham, $IdTaiKhoan) {
    $sql = "DELETE FROM `giohang` 
    WHERE `IdSanPham` = '$IdSanPham' and `IdTaiKhoan` = '$IdTaiKhoan';";
    $result = pdo_query($sql);
    return $result;
}
function delete_giohang($IdTaiKhoan) {
    $sql = "DELETE FROM `giohang` 
    WHERE `IdTaiKhoan` = '$IdTaiKhoan';";
    $result = pdo_query($sql);
    return $result;
}
function insert_soLuong_gioHang($IdSanPham, $IdTaiKhoan) {
    $sql = "update giohang set SoLuongSp = SoLuongSp + 1 where IdSanPham = $IdSanPham and IdTaiKhoan = $IdTaiKhoan";
    pdo_execute($sql);
}

function demsoluong_giohang($IdSanPham) {
    $sql = "SELECT SUM(SoLuongSp) as soluong FROM giohang WHERE IdTaiKhoan = $IdSanPham";
    $result = pdo_query_one($sql);
    return $result;
}

function insert_donhang($ngay,$tien,$id,$sl,$diachi){
    $sql = "INSERT INTO donhang (NgayDatHang,TongTien,IdTaiKhoan,SoLuongSp,DiaChiDat) VALUES ('$ngay','$tien','$id','$sl','$diachi')";
    $result = pdo_query($sql);
    return $result;
}
?>