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

    echo '+---------------MenuNhap-------------+'; //Menu nhap
    echo "\n";
    echo '| 1.Nhap chi tiet                    |';
    echo "\n";
    echo '| 2.Nhap kho (Quan ly May)           |';
    echo "\n";
    echo '| 3.Thoat                            |';
    echo "\n";
    echo '+------------------------------------+';
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
            echo '|So doi tuong can nhap:  ' . $j . ' |'; //In ra so luong can nhap
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
            echo 'Da nhap xong !';
            echo "\n";
        }
    }
    //Nhap kho
    if ($chose_luachon == 2)
    {

        $kho = new Kho();
        $kho->Nhap();
        echo "\n";
        echo 'Da nhap xong !';
        echo "\n";
    }
    //Exit
    if ($chose_luachon == 3)
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
    echo '+------------------------------------+';
    echo "\n";
    $chose_thongke = readline('Ban muon thong ke gi: ');
    //Ham kiem tra nhap yeu cau
    while ($chose_thongke > 6 || is_numeric($chose_thongke) == false) {
        echo 'Ban da yeu cau sai, moi nhap lai: ';
        $chose_thongke = readline('');
    }
    //Thong ke cac chi tiet Don, Phuc, May
    if ($chose_thongke == 4) {
        echo '+------------------------------------+';
        echo "\n";
        echo '| Chon loai thong ke:                |';
        echo "\n";
        echo '| 1. Thong tin chi tiet              |';
        echo "\n";
        echo '| 2. Tinh khoi luong                 |';
        echo "\n";
        echo '| 3. Tinh tien                       |';
        echo "\n";
        echo '+------------------------------------+';
        echo "\n";
        $chose_loai_thongke = readline('');
        //thong ke thong tin
        if ($chose_loai_thongke == 1) {
            echo ' Thong ke thong tin chi tiet';
            echo "\n";
            echo '+------------------------------------+';
            echo "\n";
            echo '| Chon loai chi tiet:                |';
            echo "\n";
            echo '| D: Chi tiet don                    |';
            echo "\n";
            echo '| P: Chi tiet phuc                   |';
            echo "\n";
            echo '| M: May                             |';
            echo "\n";
            echo '+------------------------------------+';
            echo "\n";
            $chose_loai_thongke_thongtin = readline('');
            //Thong ke CT Don
            if ($chose_loai_thongke_thongtin == 'D') {
                foreach ($arrDon as $value) {
                    $value->xuatThongTin();
                }
            }
            //Thong ke CT Phuc
            if ($chose_loai_thongke_thongtin == 'P') {
                foreach ($arrPhuc as $value) {
                    $value->xuatThongTin();
                }
            }
            //Thong ke May
            if ($chose_loai_thongke_thongtin == 'M') {
                foreach ($arrMay as $value) {
                    $value->xuatThongTin();
                }
            }
        }
        //Thong ke khoi luong
        if ($chose_loai_thongke == 2) {
            echo ' Thong ke khoi luong';
            echo "\n";
            echo '+------------------------------------+';
            echo "\n";
            echo '| Chon loai chi tiet:                |';
            echo "\n";
            echo '| D: Chi tiet don                    |';
            echo "\n";
            echo '| P: Chi tiet phuc                   |';
            echo "\n";
            echo '| M: May                             |';
            echo "\n";
            echo '+------------------------------------+';
            echo "\n";
            $chose_loai_thongke_thongtin = readline('');
            if ($chose_loai_thongke_thongtin == 'D') {
                foreach ($arrDon as $value) {
                    echo '+------------------------------------+';
                    echo "\n";
                    echo 'Khoi luong chi tiet Don ' . $value->ma_so . ' la: ' . $value->tinhKhoiLuong().' kg';
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                }

            }
            if ($chose_loai_thongke_thongtin == 'P') {
                foreach ($arrPhuc as $value) {
                    echo '+------------------------------------+';
                    echo "\n";
                    echo '| Khoi luong chi tiet Phuc ' . $value->ma_so . ' la: ' . $value->tinhKhoiLuong().' kg';
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                }
            }
            if ($chose_loai_thongke_thongtin == 'M') {
                foreach ($arrMay as $value) {
                    echo '+------------------------------------+';
                    echo "\n";
                    echo '| Khoi luong May ' . $value->ma_so . ' la: ' . $value->tinhKhoiLuong().' kg';
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                }
            }
        }
        //Thong ke tong tien
        if ($chose_loai_thongke == 3) {
            echo ' Thong ke tong tien chi tiet';
            echo "\n";
            echo '+------------------------------------+';
            echo "\n";
            echo '| Chon loai chi tiet:                |';
            echo "\n";
            echo '| D: Chi tiet don                    |';
            echo "\n";
            echo '| P: Chi tiet phuc                   |';
            echo "\n";
            echo '| M: May                             |';
            echo "\n";
            echo '+------------------------------------+';
            echo "\n";
            $chose_loai_thongke_thongtin = readline('');
            if ($chose_loai_thongke_thongtin == 'D') {
                foreach ($arrDon as $value) {
                    echo '+------------------------------------+';
                    echo "\n";
                    echo '| Tong tien chi tiet Don ' . $value->ma_so . ' la: ' . $value->tinhTien();
                    echo '+------------------------------------+';
                    echo "\n";
                }

            }
            if ($chose_loai_thongke_thongtin == 'P') {
                foreach ($arrPhuc as $value) {
                    echo '+------------------------------------+';
                    echo "\n";
                    echo '| Tong tien chi tiet Phuc ' . $value->ma_so . ' la: ' . $value->tinhTien();
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                }
            }
            if ($chose_loai_thongke_thongtin == 'M') {
                foreach ($arrMay as $value) {
                    echo '+------------------------------------+';
                    echo "\n";
                    echo '| Tong tien may: ' . $value->ten . ' la: ' . $value->tinhTien();
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                }
            }
        }
    }
    //Thong ke kho
    if ($chose_thongke == 5)
    {
        echo '+------------------------------------+';
        echo "\n";
        echo '| Chon loai thong ke:                |';
        echo "\n";
        echo '| 1. Thong tin chi tiet              |';
        echo "\n";
        echo '| 2. Tinh khoi luong                 |';
        echo "\n";
        echo '| 3. Tinh tien                       |';
        echo "\n";
        echo '| 4. Tim may theo ID                 |';
        echo "\n";
        echo '+------------------------------------+';
        echo "\n";
        $chose_loai_thongke = readline('');
        //Thong ke thong tin
        if ($chose_loai_thongke == 1) {

                $kho->xuatThongTin();
                echo "\n";
        }
        //Thong ke khoi luong
        if ($chose_loai_thongke == 2) {
            echo '+------------------------------------+';
            echo "\n";
            echo '| Tong khoi luong ' . $kho->ten . ' la: ' . $kho->tinhKhoiLuong().' kg';
            echo "\n";
            echo '+------------------------------------+';
            echo "\n";
        }
        //Thong ke tong tien
        if ($chose_loai_thongke== 3) {
            echo '+------------------------------------+';
            echo "\n";
            echo 'Tong tien ' . $kho->ten . ' la: ' . $kho->tinhTien().' VND';
            echo "\n";
            echo '+------------------------------------+';
            echo "\n";
        }
        //Tim may theo ID
        if ($chose_loai_thongke==4) {
            echo '+------------------------------------+';
            echo "\n";
            $IDmay = readline('| Nhap ma so may can tim: ');
            echo "\n";
            echo '+------------------------------------+';
            echo "\n";
            $kho->timKiemMayTheoMaSo($IDmay);
        }
    }
    //Thoat
    if ($chose_thongke==6)
    {
        break;
    }
}



