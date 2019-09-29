<?php
require_once 'ChiTiet.php';
require_once 'ChiTietDon.php';
require_once 'ChiTietPhuc.php';
require_once 'May.php';
require_once 'Kho.php';
//------------------------


$arrDon = []; // danh sach Chi tiet Don
$arrPhuc = [];// danh sach Chi tiet Phuc
$kho = null;

//Ham kiem tra nhap
while (true) {
    //Menu nhap
    echo '+------------------------------------+';
    echo "\n";
    echo '|              MENU NHAP             |';
    echo "\n";
    echo '+------------------------------------+';
    echo "\n";
    echo '| 1.Nhap chi tiet                    |';
    echo "\n";
    echo '| 2.Nhap kho (Quan ly May)           |';
    echo "\n";
    echo '| 3.Toi Menu thong ke                |';
    echo "\n";
    echo '| 4.Thoat chuong trinh               |';
    echo "\n";
    echo '+------------------------------------+';
    echo "\n";
    $chose_luachon = readline('Nhap lua chon cua ban: ');

    while (!in_array($chose_luachon,['1','2','3','4'],true)){
        echo '+--------------------------+';
        echo "\n";
        $chose_luachon = readline('| Ban da nhap sai, moi nhap lai:');
        echo '+--------------------------+';
        echo "\n";
    }
    //Nhap chi tiet
    if ($chose_luachon == 1) {
        $chi_tiet_con = null;
        $chose_soluong_doituong = readline('Ban muon nhap bao nhieu chi tiet: ');
        while ((float)$chose_soluong_doituong < 1 || ((float)$chose_soluong_doituong - (int)$chose_soluong_doituong > 0 )|| (int)strpos($chose_soluong_doituong,',') > 0) {
            echo '+--------------------------+';
            echo "\n";
            $chose_soluong_doituong = readline('| Ban da nhap sai, moi nhap lai: ');
            echo '+--------------------------+';
            echo "\n";
        }
        for ($i = 0; $i < $chose_soluong_doituong; $i++) {
            $dem = $chose_soluong_doituong - $i;
            echo '+--------------------------+';
            echo "\n";
            echo '|So doi tuong can nhap:  ' . $dem . ' |'; //In ra so luong can nhap
            echo "\n";
            echo '+--------------------------+';
            echo "\n";
            echo 'Chon doi tuong can nhap';
            echo "\n";
            echo '1: Chi tiet Don';
            echo "\n";
            echo '2: Chi tiet Phuc';
//            echo "\n";
//            echo '3: May';
            echo "\n";
            $chose_doituong = readline('Ban can nhap doi tuong nao: ');
            echo "\n";
            while (!in_array($chose_doituong,['1','2'], true)) {
                echo '+--------------------------+';
                echo "\n";
                $chose_doituong = readline('| Ban da nhap sai, moi nhap lai:');
                echo '+--------------------------+';
                echo "\n";
            }
            if ($chose_doituong == 1) {
                //Chi tiet Don
                $chi_tiet_con = new ChiTietDon();
                $chi_tiet_con->Nhap();
                array_push($arrDon, $chi_tiet_con);
            }
            //Chi tiet Phuc
            if ($chose_doituong == 2)  {
                    $chi_tiet_con = new ChiTietPhuc();
                    $chi_tiet_con->Nhap();
                    array_push($arrPhuc, $chi_tiet_con);
                        for ( $j = 0; $j < $chi_tiet_con->so_luong_chi_tiet; $j++)
                        {
                            if ( substr($chi_tiet_con->danh_sach_chi_tiet[$j]->ma_so,0,1) === 'D')
                            {
                                array_push($arrDon, $chi_tiet_con->danh_sach_chi_tiet[$j]);
                            }
                        }

            }
            echo 'Da nhap xong !';
            echo "\n";
        }
    }
    //Nhap kho
    if ($chose_luachon == 2) {
        $kho = new Kho();
        $kho->Nhap();
        for ($i = 0; $i < $kho->so_luong_chi_tiet; $i++) {
            for ($j = 0; $j < $kho->danh_sach_chi_tiet[$i]->so_luong_chi_tiet; $j++) {
                if (substr($kho->danh_sach_chi_tiet[$i]->danh_sach_chi_tiet[$j]->ma_so, 0, 1) === 'P') {
                    array_push($arrPhuc, $kho->danh_sach_chi_tiet[$i]->danh_sach_chi_tiet[$j]);
                }
                if (substr($kho->danh_sach_chi_tiet[$i]->danh_sach_chi_tiet[$j]->ma_so, 0, 1) === 'D') {
                    array_push($arrDon, $kho->danh_sach_chi_tiet[$i]->danh_sach_chi_tiet[$j]);
                }
            }
        }
        echo 'Da nhap xong !';
        echo "\n";
    }
    //Toi menu Thong ke
    if ($chose_luachon == 3) {

        while (true) {
            //Menu thong ke
            echo '+------------------------------------+';
            echo "\n";
            echo '|           MENU THONG KE            |';
            echo "\n";
            echo '+------------------------------------+';
            echo "\n";
            echo '| 1.Thong ke chi tiet Don,Phuc       |';
            echo "\n";
            echo '| 2.Thong ke kho                     |';
            echo "\n";
            echo '| 3.Tro lai Menu Nhap                |';
            echo "\n";
            echo '| 4.Thoat chuong trinh               |';
            echo "\n";
            echo '+------------------------------------+';
            echo "\n";
            $chose_thongke = readline('Ban muon thong ke gi: ');
            //Ham kiem tra nhap yeu cau
            while (!in_array($chose_thongke,['1','2','3','4'],true)) {
                echo '+------------------------------------+';
                echo "\n";
                $chose_thongke = readline('| Ban da yeu cau sai, moi nhap lai:');
                echo '+------------------------------------+';
                echo "\n";
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
                while (!in_array($chose_loai_thongke,['1','2','3'], true)) {
                    echo '+------------------------------------+';
                    echo "\n";
                    $chose_loai_thongke = readline('| Ban da yeu cau sai, moi nhap lai:');
                    echo '+------------------------------------+';
                    echo "\n";
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
//                    echo '| 3: May                             |';
//                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                    $chose_loai_thongke_thongtin = readline('Ban muon thong ke doi tuong nao: ');
                    while (!in_array($chose_loai_thongke_thongtin,['1','2','3','4'], true)) {
                        echo '+------------------------------------+';
                        echo "\n";
                        $chose_loai_thongke_thongtin = readline('| Ban da yeu cau sai, moi nhap lai:');
                        echo '+------------------------------------+';
                        echo "\n";
                    }
                    //Thong ke CT Don
                    if ($chose_loai_thongke_thongtin == 1) {
                        echo 'Co '.sizeof($arrDon).' chi tiet Don: ';
                        foreach ($arrDon as $value) {

                            echo "\n";
                            $value->xuatThongTin();
                        }
                    }
                    //Thong ke CT Phuc
                    if ($chose_loai_thongke_thongtin == 2) {
                        echo 'Co '.sizeof($arrPhuc).' chi tiet Phuc: ';
                        echo "\n";
                        foreach ($arrPhuc as $value) {

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
                    echo '+------------------------------------+';
                    echo "\n";
                    $chose_loai_thongke_thongtin = readline('');
                    while (!in_array($chose_loai_thongke_thongtin,['1','2'], true)) {
                        echo '+------------------------------------+';
                        echo "\n";
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
                }
                //Thong ke tong tien
                if ($chose_loai_thongke == 3) {
                    echo 'Thong ke tong tien: ';
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                    echo '| Chon loai chi tiet:                |';
                    echo "\n";
                    echo '| 1: Chi tiet don                    |';
                    echo "\n";
                    echo '| 2: Chi tiet phuc                   |';
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                    $chose_loai_thongke_thongtin = readline('Ban muon thong ke doi tuong nao: ');
                    while (!in_array($chose_loai_thongke_thongtin,['1','2'], true)) {
                        echo '+------------------------------------+';
                        echo "\n";
                        $chose_loai_thongke_thongtin = readline('| Ban da yeu cau sai, moi nhap lai:');
                        echo '+------------------------------------+';
                        echo "\n";
                    }
                    if ($chose_loai_thongke_thongtin == 1) {
                        foreach ($arrDon as $value) {
                            echo '+------------------------------------+';
                            echo "\n";
                            echo '| Tong tien chi tiet Don ' . $value->ma_so . ' la: ' . $value->tinhTien();
                            echo "\n";
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
                echo '| 4. Thong ke may theo Ma so         |';
                echo "\n";
                echo '+------------------------------------+';
                echo "\n";
                $chose_loai_thongke = readline('Ban muon thong ke gi: ');
                while (!in_array($chose_loai_thongke,['1','2','3','4'], true)) {
                    echo '+------------------------------------+';
                    echo "\n";
                    $chose_loai_thongke = readline('| Ban da nhap sai, moi nhap lai: ');
                    echo '+------------------------------------+';
                    echo "\n";
                }
                //Thong ke thong tin
                if ($chose_loai_thongke == 1) {
                    echo 'Co '.$kho->so_luong_chi_tiet.'may trong kho';
                    echo "\n";
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
                    echo '| Tong tien ' . $kho->ten . ' la: ' . $kho->tinhTien() . ' VND';
                    echo "\n";
                    echo '+------------------------------------+';
                    echo "\n";
                }
                //Thong ke may theo ma so
                if ($chose_loai_thongke == 4) {
                    while (true) {
                        echo '+------------------------------------+';
                        echo "\n";
                        echo '| Chon loai thong ke:                |';
                        echo "\n";
                        echo '| 1. Tim may                         |';
                        echo "\n";
                        echo '| 2. Tinh khoi luong may             |';
                        echo "\n";
                        echo '| 3. Tinh tien may                   |';
                        echo "\n";
                        echo '| 4. Tro lai Menu thong ke           |';
                        echo "\n";
                        echo '+------------------------------------+';
                        echo "\n";
                        $ma_so = readline('Nhap ma so may can thong ke: ');
                        $chose_loai_thongke_may = readline('Chon loai thong ke:');
                        while (!in_array($chose_loai_thongke_may, ['1', '2', '3','4'], true)) {
                            echo '+------------------------------------+';
                            echo "\n";
                            $chose_loai_thongke_may = readline('| Ban da nhap sai, moi nhap lai: ');
                            echo '+------------------------------------+';
                            echo "\n";
                        }
                        if ($chose_loai_thongke_may == 1) {
                            $kho->timKiemMayTheoMaSo($ma_so);
                        }
                        if ($chose_loai_thongke_may == 2) {
                            echo 'May: ' . $ma_so . ' ' . 'co khoi luong: ' . $kho->tinhKhoiLuongMayTheoMaSo($ma_so) . ' kg';
                            echo "\n";
                        }
                        if ($chose_loai_thongke_may == 3) {
                            echo 'May: ' . $ma_so . ' ' . 'co khoi luong: ' . $kho->tinhTienMayTheoMaSo($ma_so) . ' VND';
                            echo "\n";
                        }
                        if ($chose_loai_thongke_may == 4)
                        {
                            break;
                        }
                    }
                }
            }
            //Toi Menu Nhap
            if ($chose_thongke == 3) {
                break;
            }
            if ($chose_thongke == 4) {
                die();
            }
        }
    }
    //Exit
    if ($chose_luachon == 4) {
        die();
    }
}

