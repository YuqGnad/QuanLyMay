<?php
require_once 'May.php';

class Kho extends May implements NhapXuat,XuLy
{

    public function Nhap()
    {
        $this->ma_so = readline('Nhap ma so kho: ');
        $this->ten = readline('Nhap ten kho: ');
        $this->so_luong_chi_tiet = readline('Nhap so luong may: ');
        $may = null;
        for ($i = 0; $i <$this->so_luong_chi_tiet;$i++)
        {
              $may = null;
              $may = new May();
              $may->Nhap();
              array_push($this->danh_sach_chi_tiet,$may);
//            echo 'D: Chi tiet don ---------------- P: Chi tiet phuc';
//            echo "\n";
//            $loai_chi_tiet = readline('Nhap loai chi tiet: ');
//            if ($loai_chi_tiet != 'D' && $loai_chi_tiet !='P')
//            {
//                echo 'Ban da nhap sai, moi nhap lai: ';
//                echo ' ';
//                $loai_chi_tiet = readline('');
//                $i--;
//            }
//            $new_chi_tiet = null;
//            if ($loai_chi_tiet == 'D')
//            {
//                $new_chi_tiet = new ChiTietDon();
//                $new_chi_tiet->Nhap();
//                array_push($this->danh_sach_chi_tiet,$new_chi_tiet);
//
//            }
//            if ($loai_chi_tiet == 'P')
//            {
//                $new_chi_tiet = new ChiTietPhuc();
//                $new_chi_tiet->Nhap();
//                array_push($this->danh_sach_chi_tiet,$new_chi_tiet);
//            }
        }
    }

    public function xuatThongTin()
    {
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
        echo 'Thong tin chi tiet tung may: ';
        echo "\n";
        for($i=0; $i<$this->so_luong_chi_tiet; $i++)
        {
//            if (substr($this->danh_sach_chi_tiet[$i]->ma_so,0,1) == 'M')
//            {
//
//                $this->danh_sach_chi_tiet[$i]->xuatThongTin();
//            }
//            else
//            {
//
//                $this->danh_sach_chi_tiet[$i]->xuatThongTin();
//            }
////                $this->danh_sach_chi_tiet[$i]->xuatThongTin();
              $this->danh_sach_chi_tiet[$i]->xuatThongTin();
        }
    }
    public function tinhTien()
    {
        $tongTien = 0;
        for($i=0; $i<$this->so_luong_chi_tiet; $i++)
        {
            $tongTien += $this->danh_sach_chi_tiet[$i]->tinhTien();
        }
        return $tongTien;
    }

    public function tinhKhoiLuong()
    {
        $tongKL = 0;
        for($i=0; $i<$this->so_luong_chi_tiet; $i++)
        {
            $tongKL += $this->danh_sach_chi_tiet[$i]->tinhKhoiLuong();
        }
        return $tongKL;
    }
}