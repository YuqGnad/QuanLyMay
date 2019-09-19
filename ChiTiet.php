<?php


abstract class ChiTiet
{
    public $ma_so;

}

interface NhapXuat
{
    public function Nhap();

    public function xuatThongTin();
}

interface XuLy
{
    public function tinhTien();

    public function tinhKhoiLuong();
}