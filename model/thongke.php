<?php
function loadthongke_danhmuc()
{
    $sql = "select dm.idDanhMuc,dm.tenDanhMuc,COUNT(*) 'soluong', MIN(Gia) 'gia_min', 
    MAX(Gia) 'gia_max', AVG(Gia) 'gia_avg' 
    from danhmuc dm join sanpham sp on dm.idDanhMuc=sp.iddm 
    Group by dm.idDanhMuc, dm.tenDanhMuc order by soluong DESC;";
    return pdo_query($sql);
}
function loadthongke_giohang()
{
    $sql = "SELECT c.*,c.TenTaiKhoan,COUNT(*) as soLuong, SUM(b.Gia) as tongTien 
    from giohang as a join sanpham as b on a.IdSanPham = b.IdSanPham 
    join taikhoan as c on c.IdTaiKhoan = a.IdTaiKhoan";
    return pdo_query($sql);
}
function loadthongke_taikhoan()
{
    //taikhoan.IdTaiKhoan, TenTaiKhoan,HoTen,DiaChi,SoDienThoai,role,COUNT(*) as soluong
    $sql = "SELECT * from taikhoan";
    $listthongketaikhoan = pdo_query($sql);
    return $listthongketaikhoan;
}

function loadthongke_donhang()
{
    $sql = "SELECT * from `donhang` as a join taikhoan as b on a.IdTaiKhoan = b.IdTaiKhoan
    join sanpham as c on c.IdSanPham = a.IdSanPham";
    $listthongkedonhang = pdo_query($sql);
    return $listthongkedonhang;
}
?>