<?php
require_once 'ChiTiet.php';

class ChiTietPhuc extends ChiTiet implements XuLy, NhapXuat
{
    public $danh_sach_chi_tiet = array();
    public $so_luong_chi_tiet;

    //Ham nhap chi tiet Phuc
    public function Nhap($ma_so = null, $danh_sach_chi_tiet = null, $so_luong_chi_tiet_don = null)
    {
        echo 'Ma so Chi tiet Phuc co dang P** VD: P01, P02,P03..';
        echo "\n";
        $this->ma_so = readline('Nhap ma so Chi tiet Phuc: ');
        while ($this->ma_so[0] !== 'P')  //Kiem tra nhap ma so chi tiet Phuc
        {
            $this->ma_so = readline('Moi nhap lai ma so CT Phuc: ');
        }
        $this->so_luong_chi_tiet = readline('Nhap so luong chi tiet con: ');
        while ((float)$this->so_luong_chi_tiet < 1 || ((float)$this->so_luong_chi_tiet- (int)$this->so_luong_chi_tiet > 0 )|| (int)strpos($this->so_luong_chi_tiet,',') > 0) {
            $this->so_luong_chi_tiet = readline('Ban da nhap sai, moi nhap lai: ');
            echo '+--------------------------+';
            echo "\n";
        }

        for ($i = 0; $i < $this->so_luong_chi_tiet; $i++) {
            echo '1: Chi tiet Don';
            echo "\n";
            echo '2: Chi tiet Phuc';
            echo "\n";
            $loai_chi_tiet = readline('Nhap loai chi tiet: ');
            while (!in_array($loai_chi_tiet,['1','2'],true)) {
                $loai_chi_tiet = readline('Ban da nhap sai, moi nhap lai: ');
                echo '+------------------------------------+';
                echo "\n";
            }
            $new_chi_tiet = null;
            if ($loai_chi_tiet == 1) {
                $new_chi_tiet = new ChiTietDon();
                $new_chi_tiet->Nhap();
                array_push($this->danh_sach_chi_tiet, $new_chi_tiet);

            } else if ($loai_chi_tiet == 2) {
                $new_chi_tiet = new ChiTietPhuc();
                $new_chi_tiet->Nhap();
                array_push($this->danh_sach_chi_tiet, $new_chi_tiet);
            }
        }
    }

    //Ham xuat thong tin chi tiet Phuc
    public function xuatThongTin()
    {
        echo '+------------------------------------+';
        echo "\n";
        echo 'Chi tiet Phuc ';
        echo ' ';
        echo $this->ma_so;
        echo ' ';
        echo 'bao gom: ';
        echo "\n";
        echo '------------------';
        echo "\n";
        echo 'So luong chi tiet: ';
        echo ' ';
        echo $this->so_luong_chi_tiet;
        echo "\n";

        for ($i = 0; $i < $this->so_luong_chi_tiet; $i++) {
            if (substr($this->danh_sach_chi_tiet[$i]->ma_so, 0, 1) === 'P')//Kiem tra co la chi tiet Phuc hay k
            {

                $this->danh_sach_chi_tiet[$i]->xuatThongTin();
            } else {

                $this->danh_sach_chi_tiet[$i]->xuatThongTin();
            }
        }

    }

    //Ham tinh tien chi tiet Phuc
    public function tinhTien()
    {
        $tongTien = 0;
        for ($i = 0; $i < $this->so_luong_chi_tiet; $i++) {
            if (substr($this->danh_sach_chi_tiet[$i]->ma_so, 0, 1) === 'P') {
                $tongTien += $this->danh_sach_chi_tiet[$i]->tinhTien();
            } else {
                $tongTien += $this->danh_sach_chi_tiet[$i]->tinhTien();
            }
        }
        return $tongTien;
    }

    //Ham tinh khoi luong CT Phuc
    public function tinhKhoiLuong()
    {
        $tongKL = 0;
        for ($i = 0; $i < $this->so_luong_chi_tiet; $i++) {

            $tongKL += $this->danh_sach_chi_tiet[$i]->tinhKhoiLuong();
        }
        return $tongKL;
    }
}