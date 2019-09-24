<?php
require_once 'ChiTiet.php';

class ChiTietDon extends ChiTiet implements NhapXuat, XuLy
{
    public $gia;
    public $khoi_luong;

    public function Nhap($ma_so = null, $gia = null, $khoi_luong = 0)
    {
        $this->ma_so = readline('Nhap ma so Chi tiet don: ');
        while ($this->ma_so[0]!='D') //&& $this->gia < 0 && $this->khoi_luong < 0) //Kiem tra nhap ma so chi tiet don
        {
            $this->ma_so = readline('Moi nhap lai ');
        }
        $this->gia = readline('Nhap gia Chi tiet don: ');
//        while ($this->gia < 0 && is_numeric($this->gia) == true )
//        {
//            $this->gia = readline('Hay nhap gia dung : ');
//           // $this->khoi_luong = readline('Nhap khoi luong Chi tiet don: ');
//
//        }
        $this->khoi_luong = readline('Nhap khoi luong : ');
    }

    public function xuatThongTin()
    {
        echo '+------------------------------------+';
        echo "\n";
        echo '| Ma so chi tiet Don: ' . $this->ma_so;
        echo "\n";
        echo '| Gia tien chi tiet Don: ' . $this->gia. ' VND';
        echo "\n";
        echo '| Khoi luong chi tiet Don: ' . $this->khoi_luong. ' kg';
        echo "\n";
        echo '+------------------------------------+';
        echo "\n";
    }

    public function tinhTien()
    {
        return $this->gia;
    }

    public function tinhKhoiLuong()
    {
        return $this->khoi_luong;
    }

}