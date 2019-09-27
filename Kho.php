<?php
require_once 'May.php';

class Kho extends May
{
    //Ham Nhap kho
    public function Nhap($ma_so = null, $ten = null, $danh_sach_chi_tiet = null)
    {
        echo 'Ma so Kho co dang K** VD: K01, K02, K03..';
        echo "\n";
        $this->ma_so = readline('Nhap ma so kho: ');
        while ($this->ma_so[0] !== 'K')  //Kiem tra nhap ma so Kho
        {
            echo '+------------------------------------+';
            echo "\n";
            $this->ma_so = readline('Ban da nhap sai, moi nhap lai ');
            echo '+------------------------------------+';
            echo "\n";
        }
        $this->ten = readline('Nhap ten kho: ');
        while ($this->ten[0] === ' ') {
            echo '+------------------------------------+';
            echo "\n";
            $this->ten = readline('Ban da nhap sai, moi nhap lai: ');
            echo '+------------------------------------+';
            echo "\n";
        }

        $this->so_luong_chi_tiet = readline('Nhap so luong may: ');
        while ((float)$this->so_luong_chi_tiet < 1 || ((float)$this->so_luong_chi_tiet - (int)$this->so_luong_chi_tiet > 0 )|| (int)strpos($this->so_luong_chi_tiet,',') > 0) {
            echo '+------------------------------------+';
            echo "\n";
            $this->so_luong_chi_tiet = readline('| Ban da nhap sai, moi nhap lai:');
            echo '+------------------------------------+';
            echo "\n";
        }
        $may = null;
        for ($i = 0; $i < $this->so_luong_chi_tiet; $i++) {
            $j = $this->so_luong_chi_tiet - $i;
            echo '+------------------------------------+';
            echo "\n";
            echo '|So may can nhap:  ' . $j; //In ra so luong can nhap
            echo "\n";
            echo '+------------------------------------+';
            echo "\n";
            $may = null;
            $may = new May();
            $may->Nhap();
            array_push($this->danh_sach_chi_tiet, $may);

        }
    }

    // Ham xuat thong tin kho
    public function xuatThongTin()
    {
        echo '+------------------------------------+';
        echo "\n";
        echo 'Kho: ';
        echo ' ';
        echo $this->ma_so;
        echo ' ';
        echo 'bao gom ';
        echo ' ';
        echo $this->so_luong_chi_tiet;
        echo ' ';
        echo 'may';
        echo "\n";
        echo '---------------------------';
        echo "\n";
        echo 'Thong tin chi tiet tung may: ';
        echo "\n";
        for ($i = 0; $i < $this->so_luong_chi_tiet; $i++) {
            $this->danh_sach_chi_tiet[$i]->xuatThongTin();
        }

    }

    //Ham tinh tien trong kho
    public function tinhTien()
    {
        $tongTien = 0;
        for ($i = 0; $i < $this->so_luong_chi_tiet; $i++) {
            $tongTien += $this->danh_sach_chi_tiet[$i]->tinhTien();
        }
        return $tongTien;
    }

    //Ham tinh khoi luong kho
    public function tinhKhoiLuong()
    {
        $tongKL = 0;
        for ($i = 0; $i < $this->so_luong_chi_tiet; $i++) {
            $tongKL += $this->danh_sach_chi_tiet[$i]->tinhKhoiLuong();
        }
        return $tongKL;
    }

    //ham tim kiem may theo ma so
    public function timKiemMayTheoMaSo($ma_so)
    {
        for ($i = 0; $i < $this->so_luong_chi_tiet; $i++) {
            if ($this->danh_sach_chi_tiet[$i]->ma_so != $ma_so) {
                echo 'Khong tim thay may nao !';
                echo "\n";
            }
            else {
                $this->danh_sach_chi_tiet[$i]->xuatThongTin();
                echo "\n";
            }
        }
    }
    public function tinhKhoiLuongMayTheoMaSo($ma_so)
    {
        for($i = 0; $i < $this->so_luong_chi_tiet; $i++)
        {
            if ($this->danh_sach_chi_tiet[$i]->ma_so != $ma_so) {
                echo 'Khong tim thay may nao !';
                echo "\n";
            }
            else {
                return $this->danh_sach_chi_tiet[$i]->tinhKhoiLuong();
                echo "\n";
            }

        }
    }
    public function tinhTienMayTheoMaSo($ma_so)
    {
        for($i = 0; $i < $this->so_luong_chi_tiet; $i++)
        {
            if ($this->danh_sach_chi_tiet[$i]->ma_so != $ma_so) {
                echo 'Khong tim thay may nao !';
                echo "\n";
            }
            else {
                return $this->danh_sach_chi_tiet[$i]->tinhTien();
                echo "\n";
            }

        }
    }
}