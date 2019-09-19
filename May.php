<?php


class May extends ChiTietPhuc implements NhapXuat,XuLy
{
    public $ten;

    public function Nhap($ma_so = null, $ten_may = null, $danh_sach_chi_tiet = null)
    {
        $this->ma_so = readline('Nhap ma so may: ');
        $this->ten = readline('Nhap ten may: ');
        $this->so_luong_chi_tiet = readline('Nhap so luong chi tiet cua may: ');
        for ($i = 0; $i <$this->so_luong_chi_tiet;$i++)
        {
            echo 'D: Chi tiet don ---------------- P: Chi tiet phuc';
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

    }
    public function xuatThongTin()
    {
        echo 'May: ';
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
            if (substr($this->danh_sach_chi_tiet[$i]->ma_so,0,1) == 'M')
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
            if (substr($this->danh_sach_chi_tiet[$i]->ma_so,0,1) == 'M')
            {
                $tongTien += $this->danh_sach_chi_tiet[$i]->tinhTien();
            }
            else
            {
                $tongTien += $this->danh_sach_chi_tiet[$i]->tinhTien();
            }
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