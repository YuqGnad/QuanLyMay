<?php
require_once 'ChiTiet.php';

class ChiTietDon extends ChiTiet implements NhapXuat, XuLy
{
    public $gia;
    public $khoi_luong;

    //Ham nhap chi tiet don
    public function Nhap($ma_so = null, $gia = null, $khoi_luong = 0)
    {
        echo 'Ma so Chi tiet Don co dang D** VD: D01, D02,D03..';
        echo "\n";
        $this->ma_so = readline('Nhap ma so Chi tiet don: ');
        while ($this->ma_so[0]!='D')  //Kiem tra nhap ma so chi tiet don
        {

            $this->ma_so = readline('Moi nhap lai ma so chi tiet don ');
        }
        $this->gia = readline('Nhap gia Chi tiet don: ');
        $this->khoi_luong = readline('Nhap khoi luong : ');
    }

    //Ham xuat chi tiet don
    public function xuatThongTin()
    {
        echo '+------------------------------------+';
        echo "\n";
        echo '| Ma so chi tiet Don: ' . $this->ma_so;
        echo "\n";
        echo '| Gia tien chi tiet Don: ' . $this->gia . ' VND';
        echo "\n";
        echo '| Khoi luong chi tiet Don: ' . $this->khoi_luong . ' kg';
        echo "\n";
        echo '+------------------------------------+';
        echo "\n";
    }

    //Ham lay gia tien chi tiet Don
    public function tinhTien()
    {
        return $this->gia;
    }

    //ham lay khoi luong chi tiet Don
    public function tinhKhoiLuong()
    {
        return $this->khoi_luong;
    }

}