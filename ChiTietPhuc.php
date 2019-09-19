<?php
require_once 'ChiTiet.php';
class ChiTietPhuc extends ChiTiet implements XuLy,NhapXuat
{
    public $danh_sach_chi_tiet = array();
    public $so_luong_chi_tiet;

    public function Nhap($ma_so = null, $danh_sach_chi_tiet = null, $so_luong_chi_tiet_don = null)
    {
        $this->ma_so = readline('Nhap ma so Chi tiet Phuc: ');
        $this->so_luong_chi_tiet = readline('Nhap so luong chi tiet con: ');

        for ($i = 0; $i <$this->so_luong_chi_tiet;$i++)
        {
            echo 'D: Chi tiet don ----------------P: Chi tiet phuc';
            echo "\n";
            $loai_chi_tiet = readline('Nhap loai chi tiet: ');
            $new_chi_tiet = null;
            if ($loai_chi_tiet == 'D')
            {
                $new_chi_tiet = new ChiTietDon();
                $new_chi_tiet->Nhap();
                array_push($this->danh_sach_chi_tiet,$new_chi_tiet);

            }
            if ($loai_chi_tiet == 'P')
            {
                $new_chi_tiet = new ChiTietPhuc();
                $new_chi_tiet->Nhap();
                array_push($this->danh_sach_chi_tiet,$new_chi_tiet);
            }
        }
//        $new_chi_tiet->Nhap();
//        array_push($this->danh_sach_chi_tiet,$new_chi_tiet);
    }

    public function xuatThongTin()
    {
        echo '-----Chi tiet Phuc ';
        echo ' ';
        echo $this->ma_so;
        echo ' ';
        echo 'bao gom: ';
        echo "\n";
        echo '-----';
        echo 'So luong chi tiet: ';
        echo ' ';
        echo $this->so_luong_chi_tiet;
        echo "\n";

        for($i=0; $i<$this->so_luong_chi_tiet; $i++)
        {
            if (substr($this->danh_sach_chi_tiet[$i]->ma_so,0,1) == 'P')
            {

                $this->danh_sach_chi_tiet[$i]->xuatThongTin();
            }
            else
            {

                $this->danh_sach_chi_tiet[$i]->xuatThongTin();
            }
//                $this->danh_sach_chi_tiet[$i]->xuatThongTin();
        }
    }
    public function tinhTien()
    {
        $tongTien = 0;
        for($i=0; $i<$this->so_luong_chi_tiet; $i++)
        {
            if (substr($this->danh_sach_chi_tiet[$i]->ma_so,0,1) == 'P')
            {
                $tongTien += $this->danh_sach_chi_tiet[$i]->tinhTien();
            }
            else
            {
                $tongTien += $this->danh_sach_chi_tiet[$i]->tinhTien();
            }
        }
//        foreach ($this->danh_sach_chi_tiet as $ds)
//        {
//            if (substr($ds->ma_so,0,1) != 'P')
//            {
//                $tong += $ds->tinhTien();
//            }
//            else
//            {
//                $a = new ChiTietPhuc($ds->ma_so,$ds->danh_sach_chi_tiet,sizeof($ds->danh_sach_chi_tiet));
//                $tong = $tong + $a->tinhTien();
//            }
//        }
        return $tongTien;
    }
    public function tinhKhoiLuong()
    {
        $tongKL = 0;
        for($i=0; $i<$this->so_luong_chi_tiet; $i++)
        {
//            if (substr($this->danh_sach_chi_tiet[$i]->ma_so,0,1) != 'P')
//            {
//                $tongKL += $this->danh_sach_chi_tiet[$i]->tinhKhoiLuong();
//            }
//            else
//            {
//                $tongKL += $this->danh_sach_chi_tiet[$i]->tinhKhoiLuong();
//            }
            //Cach 2:

            $tongKL += $this->danh_sach_chi_tiet[$i]->tinhKhoiLuong();
        }
        return $tongKL;
    }
}