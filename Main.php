<?php
namespace Roog\Kmc;

//加载autoload
require_once __DIR__ . '/vendor/autoload.php';

use Roog\Kmc\Lib\Converse\LengthUnit\Length;
use Roog\Kmc\Lib\Converse\LengthUnit\LengthUnit;
use Roog\Kmc\Lib\Converse\WeightUnit\Weight;
use Roog\Kmc\Lib\Converse\WeightUnit\WeightUnit;
use Roog\Kmc\Model\Package;

class Main
{
    public function test(float $length, float $width, float $height, float $weight): array
    {
        //实例化长度对象，方便转换
        $lengthObj = new Length($length, LengthUnit::INCH);
        $widthObj = new Length($width, LengthUnit::INCH);
        $heightObj = new Length($height, LengthUnit::INCH);
        //实例化重量对象，方便转换
        $weightObj = new Weight($weight, WeightUnit::POUND);

        echo "长度转换： 长 " . $lengthObj->getNumber() . "cm" . PHP_EOL;
        echo "长度转换： 宽 " . $widthObj->getNumber() . "cm" . PHP_EOL;
        echo "长度转换： 高 " . $heightObj->getNumber() . "cm" . PHP_EOL;
        echo "重量转换： " . $weightObj->getNumber() . "kg" . PHP_EOL;

        $package = new Package($weightObj,$lengthObj, $widthObj, $heightObj);

        return [];
    }
}
$obj = new Main();
var_dump($obj->test(68, 70, 60, 23));