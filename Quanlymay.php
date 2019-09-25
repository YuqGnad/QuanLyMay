<?php
require_once 'ChiTiet.php';
require_once 'ChiTietDon.php';
require_once 'ChiTietPhuc.php';
require_once 'May.php';
require_once 'Kho.php';
//------------------------


$arrDon = []; // danh sach Chi tiet Don
$arrPhuc = [];// danh sach Chi tiet Phuc
$arrMay = []; // danh sach May
$kho = null;

//Ham kiem tra nhap
while (true) {

    echo '+---------------MenuNhap-------------+'; //Menu nhap
    echo "\n";
    echo '| 1.Nhap chi tiet                    |';
    echo "\n";
    echo '| 2.Nhap kho (Quan ly May)           |';
    echo "\n";
    echo '| 3.Toi Menu thong ke                |';
    echo "\n";
    echo '| 4.Thoat                            |';
    echo "\n";
    echo '+------------------------------------+';
    echo "\n";
    $chose_luachon = readline('Nhap lua chon cua ban: ');
    while ($chose_luachon > 4 || (is_numeric($chose_luachon) == false && is_int($chose_luachon) == false && is_double($chose_luachon) == true) || $chose_luachon <= 0) {
        $chose_luachon = readline('Ban da nhap sai, moi nhap lai:');
        echo '+--------------------------+';
        echo "\n";
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
            echo '1: Chi tiet Don';
            echo "\n";
            echo '2: Chi tiet Phuc';
            echo "\n";
            echo '3: May';
            echo "\n";
            $chose_doituong = readline('Ban can nhap doi tuong nao: ');
            echo "\n";
            while ($chose_doituong > 3 || (is_numeric($chose_doituong) == false && is_int($chose_doituong) == false && is_double($chose_doituong) == true) || $chose_doituong <= 0) {
                $chose_doituong = readline('Ban da nhap sai, moi nhap lai:');
                echo '+--------------------------+';
                echo "\n";
            }
            switch ($chose_doituong) {
                case 1: //Chi tiet don
                    $chi_tiet_con = new ChiTietDon();
                    $chi_tiet_con->Nhap();
                    array_push($arrDon, $chi_tiet_con);
                    break;
                case 2: //Chi tiet phuc
                    $chi_tiet_con = new ChiTietPhuc();
                    $chi_tiet_con->Nhap();
                    array_push($arrPhuc, $chi_tiet_con);
                    break;
                case 3: //May
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
    if ($chose_luachon == 2) {
        $kho = new Kho();
        $kho->Nhap();
        echo "\n";
        echo 'Da nhap xong !';
        echo "\n";
    }
    //Toi menu Thong ke
    if ($chose_luachon == 3) {

        while (true) {
            echo '+--------------MenuThongke-----------+';//Menu thong ke
            echo "\n";
            echo '| 1.Thong ke chi tiet don,phuc,may   |';
            echo "\n";
            echo '| 2.Thong ke kho                     |';
            echo "\n";
            echo '| 3.Tro lai Menu Nhap                |';
            echo "\n";
            echo '+------------------------------------+';
            echo "\n";
            $chose_thongke = readline('Ban muon thong ke gi: ');
            //Ham kiem tra nhap yeu cau
            while ($chose_thongke > 3 || (is_numeric($chose_thongke) == false && is_int($chose_thongke) == false && is_double($chose_thongke) == true) || $chose_thongke <= 0) {
                echo 'Ban da yeu cau sai, moi nhap lai: ';
                $chose_thongke = readline('');
            }
            //Thong ke cac chi tiet Don, Phuc, May
            if ($chose_thongke == 1) {
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
                $chose_loai_thongke = readline('Ban muon thong ke gi: ');
                while ($chose_loai_thongke > 3 || (is_numeric($chose_loai_thongke) == false && is_int($chose_loai_thongke) == false && is_double($chose_loai_thongke) == true) || $chose_loai_thongke <= 0) {
                    echo 'Ban da yeu cau sai, moi nhap lai: ';
                    $chose_loai_thongke = readline('');
                }
                //thong ke thong tin
                if ($chose_loai_thongke == 1) {
                    echo ' Thong ke thong tin chi tiet';
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                    echo '| Chon loai chi tiet:                |';
                    echo "\n";
                    echo '| 1: Chi tiet don                    |';
                    echo "\n";
                    echo '| 2: Chi tiet phuc                   |';
                    echo "\n";
                    echo '| 3: May                             |';
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                    $chose_loai_thongke_thongtin = readline('Ban muon thong ke doi tuong nao: ');
                    while ($chose_loai_thongke_thongtin > 3 || (is_numeric($chose_loai_thongke_thongtin) == false && is_int($chose_loai_thongke_thongtin) == false && is_double($chose_loai_thongke_thongtin) == true) || $chose_loai_thongke_thongtin <= 0) {
                        $chose_loai_thongke_thongtin = readline('Ban da yeu cau sai, moi nhap lai:');
                        echo '+------------------------------------+';
                        echo "\n";
                    }
                    //Thong ke CT Don
                    if ($chose_loai_thongke_thongtin == 1) {
                        foreach ($arrDon as $value) {
                            $value->xuatThongTin();
                        }
                    }
                    //Thong ke CT Phuc
                    if ($chose_loai_thongke_thongtin == 2) {
                        foreach ($arrPhuc as $value) {
                            $value->xuatThongTin();
                        }
                    }
                    //Thong ke May
                    if ($chose_loai_thongke_thongtin == 3) {
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
                    echo '| 1: Chi tiet don                    |';
                    echo "\n";
                    echo '| 2: Chi tiet phuc                   |';
                    echo "\n";
                    echo '| 3: May                             |';
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                    $chose_loai_thongke_thongtin = readline('');
                    while ($chose_loai_thongke_thongtin > 3 || (is_numeric($chose_loai_thongke_thongtin) == false && is_int($chose_loai_thongke_thongtin) == false && is_double($chose_loai_thongke_thongtin) == true) || $chose_loai_thongke_thongtin <= 0) {
                        $chose_loai_thongke_thongtin = readline('Ban da yeu cau sai, moi nhap lai:');
                        echo '+------------------------------------+';
                        echo "\n";
                    }
                    if ($chose_loai_thongke_thongtin == 1) {
                        foreach ($arrDon as $value) {
                            echo '+------------------------------------+';
                            echo "\n";
                            echo 'Khoi luong chi tiet Don ' . $value->ma_so . ' la: ' . $value->tinhKhoiLuong() . ' kg';
                            echo "\n";
                            echo '+------------------------------------+';
                            echo "\n";
                        }

                    }
                    if ($chose_loai_thongke_thongtin == 2) {
                        foreach ($arrPhuc as $value) {
                            echo '+------------------------------------+';
                            echo "\n";
                            echo '| Khoi luong chi tiet Phuc ' . $value->ma_so . ' la: ' . $value->tinhKhoiLuong() . ' kg';
                            echo "\n";
                            echo '+------------------------------------+';
                            echo "\n";
                        }
                    }
                    if ($chose_loai_thongke_thongtin == 3) {
                        foreach ($arrMay as $value) {
                            echo '+------------------------------------+';
                            echo "\n";
                            echo '| Khoi luong May ' . $value->ma_so . ' la: ' . $value->tinhKhoiLuong() . ' kg';
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
                    echo '| 1: Chi tiet don                    |';
                    echo "\n";
                    echo '| 2: Chi tiet phuc                   |';
                    echo "\n";
                    echo '| 3: May                             |';
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                    $chose_loai_thongke_thongtin = readline('Ban muon thong ke doi tuong nao');
                    while ($chose_loai_thongke_thongtin > 3 || (is_numeric($chose_loai_thongke_thongtin) == false && is_int($chose_loai_thongke_thongtin) == false && is_double($chose_loai_thongke_thongtin) == true) || $chose_loai_thongke_thongtin <= 0) {
                        $chose_loai_thongke_thongtin = readline('Ban da yeu cau sai, moi nhap lai:');
                        echo '+------------------------------------+';
                        echo "\n";
                    }
                    if ($chose_loai_thongke_thongtin == 1) {
                        foreach ($arrDon as $value) {
                            echo '+------------------------------------+';
                            echo "\n";
                            echo '| Tong tien chi tiet Don ' . $value->ma_so . ' la: ' . $value->tinhTien();
                            echo '+------------------------------------+';
                            echo "\n";
                        }

                    }
                    if ($chose_loai_thongke_thongtin == 2) {
                        foreach ($arrPhuc as $value) {
                            echo '+------------------------------------+';
                            echo "\n";
                            echo '| Tong tien chi tiet Phuc ' . $value->ma_so . ' la: ' . $value->tinhTien();
                            echo "\n";
                            echo '+------------------------------------+';
                            echo "\n";
                        }
                    }
                    if ($chose_loai_thongke_thongtin == 3) {
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
            if ($chose_thongke == 2) {
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
                $chose_loai_thongke = readline('Ban muon thong ke gi: ');
                while ($chose_loai_thongke > 4 || (is_numeric($chose_loai_thongke) == false && is_int($chose_loai_thongke) == false && is_double($chose_loai_thongke) == true) || $chose_loai_thongke <= 0) {
                    echo 'Ban da nhap sai, moi nhap lai: ';
                    $chose_loai_thongke = readline('');
                }
                //Thong ke thong tin
                if ($chose_loai_thongke == 1) {

                    $kho->xuatThongTin();
                    echo "\n";
                }
                //Thong ke khoi luong
                if ($chose_loai_thongke == 2) {
                    echo '+------------------------------------+';
                    echo "\n";
                    echo '| Tong khoi luong ' . $kho->ten . ' la: ' . $kho->tinhKhoiLuong() . ' kg';
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                }
                //Thong ke tong tien
                if ($chose_loai_thongke == 3) {
                    echo '+------------------------------------+';
                    echo "\n";
                    echo 'Tong tien ' . $kho->ten . ' la: ' . $kho->tinhTien() . ' VND';
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                }
                //Tim may theo ID
                if ($chose_loai_thongke == 4) {
                    echo '+------------------------------------+';
                    echo "\n";
                    $IDmay = readline('| Nhap ma so may can tim: ');
                    echo "\n";
                    echo '+------------------------------------+';
                    $kho->timKiemMayTheoMaSo($IDmay);
                }
            }
            //Toi Menu Nhap
            if ($chose_thongke == 3) {
                break;
            }
        }
    }
    //Exit
    if ($chose_luachon == 4) {
        break;
    }
}

