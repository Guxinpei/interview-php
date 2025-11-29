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
        $lengthObj = new Length($length, LengthUnit::CM);
        $widthObj = new Length($width, LengthUnit::CM);
        $heightObj = new Length($height, LengthUnit::CM);
        //实例化重量对象，方便转换
        $weightObj = new Weight($weight, WeightUnit::POUND);


        $package = new Package($weightObj, $lengthObj, $widthObj, $heightObj);

        $this->logOutPackage($package);
        return [];
    }

    private function printStdioMuti(...$args): void
    {
        array_map(
            static fn($arg) => printf("%s" . PHP_EOL, $arg),
            $args
        );
    }

    private function logOutPackage(Package $package): void
    {
        $this->printStdioMuti(
            "长度转换： 长 " . $package->getLength()->getNumber() . " cm",
            "长度转换： 长 " . $package->getLength()->getNumber(LengthUnit::INCH) . " in",
            "长度转换： 宽 " . $package->getWidth()->getNumber() . " cm",
            "长度转换： 宽 " . $package->getWidth()->getNumber(LengthUnit::INCH) . " in",
            "长度转换： 高 " . $package->getHeight()->getNumber() . " cm",
            "长度转换： 高 " . $package->getHeight()->getNumber(LengthUnit::INCH) . " in",
            "重量转换： " . $package->getWeight()->getNumber() . " kg",
            "重量转换： " . $package->getWeight()->getNumber(WeightUnit::POUND) . " lb",
        );

        $perimeter = $package->getPerimeter()->getNumber();
        $this->printStdioMuti("周长： " . $perimeter . ' cm');

        $volume = $package->getVolume();
        $this->printStdioMuti("体积： " . $volume . ' m³');

        $volumeWeight = $package->getVolumeWeight()->getNumber();
        $this->printStdioMuti("体积重： " . $volumeWeight);
    }
}

$obj = new Main();
var_dump($obj->test(68, 70, 60, 23));