<?php
require_once 'ChiTiet.php';
require_once 'ChiTietDon.php';
require_once 'ChiTietPhuc.php';
require_once 'May.php';
require_once 'Kho.php';
//------------------------


$arrDon = [];
$arrPhuc = [];
$arrMay = [];
$kho = null;

//Ham kiem tra nhap
while (true)
{
    
    echo '+--------Menu-Nhap-------+'; //Menu nhap
    echo "\n";
    echo '|    1.Nhap chi tiet     |';
    echo "\n";
    echo '|    2.Nhap kho (QL may) |';
    echo "\n";
    echo '|    3.Thoat             |';
    echo "\n";
    echo '+------------*-----------+';
    echo "\n";
    $chose_luachon = readline('Nhap lua chon cua ban: ');
    while ($chose_luachon > 3 || is_numeric($chose_luachon) == false) {
        echo 'Ban da nhap sai, moi nhap lai: ';
        $chose_luachon = readline('');
    }
//Nhap chi tiet
    if ($chose_luachon == 1) {
        $chi_tiet_con = null;
        $chose_soluong_doituong = readline('Ban muon nhap bao nhieu doi tuong: ');
        for ($i = 0; $i < $chose_soluong_doituong; $i++) {
            $j = $chose_soluong_doituong - $i;
            echo '+--------------------------+';
            echo "\n";
            echo '|So doi tuong can nhap:  ' . $j . '|';
            echo "\n";
            echo '+--------------------------+';
            echo "\n";
            echo 'Chon doi tuong can nhap';
            echo "\n";
            echo 'D: Chi tiet Don';
            echo "\n";
            echo 'P: Chi tiet Phuc';
            echo "\n";
            echo 'M: May';
            echo "\n";
            $chose_doituong = readline('');
            echo "\n";
            switch ($chose_doituong) {
                case 'D': //Chi tiet don
                    $chi_tiet_con = new ChiTietDon();
                    $chi_tiet_con->Nhap();
                    array_push($arrDon, $chi_tiet_con);
                    break;
                case 'P': //Chi tiet phuc
                    $chi_tiet_con = new ChiTietPhuc();
                    $chi_tiet_con->Nhap();
                    array_push($arrPhuc, $chi_tiet_con);
                    break;
                case 'M': //May
                    $chi_tiet_con = new May();
                    $chi_tiet_con->Nhap();
                    array_push($arrMay, $chi_tiet_con);
                    break;
            }
            echo 'Da nhap xong';
            echo "\n";
        }
    }
    if ($chose_luachon == 2) //Nhap kho
    {

        $kho = new Kho();
        $kho->Nhap();
        echo "\n";
        echo 'Da nhap xong !';
    }
    if ($chose_luachon == 3) //Exit
    {
        break;
    }
}
while (true) {
    echo '+--------------MenuThongke-----------+';//Menu thong ke
    echo "\n";
    echo '|4.Thong ke chi tiet don,phuc,may    |';
    echo "\n";
    echo '|5.Thong ke kho                      |';
    echo "\n";
    echo '|6.Thoat                             |';
    echo "\n";
    echo '+------------------*-----------------+';
    echo "\n";
    $chose_thongke = readline('');
    while ($chose_thongke > 6 || is_numeric($chose_thongke) == false) {
        echo 'Ban da nhap sai, moi nhap lai: ';
        $chose_thongke = readline('');
    }
    if ($chose_thongke == 4) {
        echo 'Chon loai thong ke: ';
        echo "\n";
        echo '1. Thong tin chi tiet';
        echo "\n";
        echo '2. Tinh khoi luong ';
        echo "\n";
        echo '3. Tinh tien       ';
        echo "\n";
        $chose_loai_thongke = readline('');
        if ($chose_loai_thongke == 1) {
            echo 'Chon loai chi tiet: ';
            echo "\n";
            echo '1. Chi tiet don ';
            echo "\n";
            echo '2. Chi tiet phuc ';
            echo "\n";
            echo '3. May';
            echo "\n";
            $chose_loai_thongke_thongtin = readline('');
            if ($chose_loai_thongke_thongtin == 1) {
                foreach ($arrDon as $value) {
                    $value->xuatThongTin();
                }
            }
            if ($chose_loai_thongke_thongtin == 2) {
                foreach ($arrPhuc as $value) {
                    $value->xuatThongTin();
                }
            }
            if ($chose_loai_thongke_thongtin == 3) {
                foreach ($arrMay as $value) {
                    $value->xuatThongTin();
                }
            }
        }
        if ($chose_loai_thongke == 2) {
            echo 'Chon loai chi tiet: ';
            echo "\n";
            echo '1. Chi tiet don ';
            echo "\n";
            echo '2. Chi tiet phuc ';
            echo "\n";
            echo '3. May';
            echo "\n";
            $chose_loai_thongke_thongtin = readline('');
            if ($chose_loai_thongke_thongtin == 1) {
                foreach ($arrDon as $value) {
                    echo 'Khoi luong chi tiet Don ' . $value->ma_so . ' la: ' . $value->tinhKhoiLuong().' kg';
                    echo '___________________________________________';
                    echo "\n";
                }

            }
            if ($chose_loai_thongke_thongtin == 2) {
                foreach ($arrPhuc as $value) {
                    echo 'Khoi luong chi tiet Phuc ' . $value->ma_so . ' la: ' . $value->tinhKhoiLuong().' kg';
                    echo '___________________________________________';
                    echo "\n";
                }
            }
            if ($chose_loai_thongke_thongtin == 3) {
                foreach ($arrMay as $value) {
                    echo 'Khoi luong May ' . $value->ma_so . ' la: ' . $value->tinhKhoiLuong().' kg';
                    echo '___________________________________________';
                    echo "\n";
                }
            }
        }
        if ($chose_loai_thongke == 3) {
            echo 'Chon loai chi tiet: ';
            echo "\n";
            echo '1. Chi tiet don ';
            echo "\n";
            echo '2. Chi tiet phuc ';
            echo "\n";
            echo '3. May';
            echo "\n";
            $chose_loai_thongke_thongtin = readline('');
            if ($chose_loai_thongke_thongtin == 1) {
                foreach ($arrDon as $value) {
                    echo 'Tong tien chi tiet Don ' . $value->ma_so . ' la: ' . $value->tinhTien();
                    echo '___________________________________________';
                    echo "\n";
                }

            }
            if ($chose_loai_thongke_thongtin == 2) {
                foreach ($arrPhuc as $value) {
                    echo 'Tong tien chi tiet Phuc ' . $value->ma_so . ' la: ' . $value->tinhTien();
                    echo '___________________________________________';
                    echo "\n";
                }
            }
            if ($chose_loai_thongke_thongtin == 3) {
                foreach ($arrMay as $value) {
                    echo 'Tong tien may: ' . $value->ten . ' la: ' . $value->tinhTien();
                    echo '___________________________________________';
                    echo "\n";
                }
            }
        }
    }
    if ($chose_thongke == 5)
    {
        echo 'Chon loai thong ke: ';
        echo "\n";
        echo '1. Thong tin chi tiet';
        echo "\n";
        echo '2. Tinh khoi luong ';
        echo "\n";
        echo '3. Tinh tien       ';
        echo "\n";
        $chose_loai_thongke = readline('');
        if ($chose_loai_thongke == 1) {

                $kho->xuatThongTin();
                echo "\n";
        }
        if ($chose_loai_thongke == 2) {
                echo 'Tong khoi luong Kho ' . $kho->ten . ' la: ' . $kho->tinhKhoiLuong().' kg';
                echo "\n";
        }
        if ($chose_loai_thongke== 3) {

                echo 'Tong tien Kho ' . $kho->ten . ' la: ' . $kho->tinhTien();
                echo "\n";
        }
    }
    if ($chose_thongke==6)
    {
        break;
    }
}








//echo 'Danh sach chi tiet don: ';
//echo "\n";
//foreach ($arrDon as $value)
//{
//    $value->xuatThongTin();
//}
//echo 'Danh sach chi tiet Phuc: ';
//echo "\n";
//foreach ($arrPhuc as $value)
//{
//    $value->xuatThongTin();
//}
//echo 'Danh sach may : ';
//echo "\n";
//foreach ($arrMay as $value)
//{
//    $value->xuatThongTin();
//}
//$tong = 0;
//$tongKL=0;
//foreach ($arr as $value)
//{
//    $tong += $value->tinhTien();
//}
//foreach ($arr as $value)
//{
//    $tongKL += $value->tinhKhoiLuong();
//}
//echo 'Tong tien cua may: '.$tong;
//echo 'Tong KL cua may: '.$tongKL;
//$a = new Kho();
//$a->Nhap();
//$a->xuatThongTin();
//echo $a->tinhTien();
//echo $a->tinhKhoiLuong();


