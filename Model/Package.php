<?php

namespace Roog\Kmc\Model;

use Roog\Kmc\Lib\Converse\LengthUnit\Length;
use Roog\Kmc\Lib\Converse\LengthUnit\LengthUnit;
use Roog\Kmc\Lib\Converse\WeightUnit\Weight;
use Roog\Kmc\Lib\Converse\WeightUnit\WeightUnit;

/**
 * 表示包裹的类，实现了PackageContract接口。
 */
readonly class Package implements PackageContract
{

    public const int SCALE = 5;
    public const VOLUME_WEIGHT_SCALE = 250;

    /**
     * 创建包裹对象。
     * @param Weight $weight 对象的重量。
     * @param Length $length 对象的长度。
     * @param Length $width 对象的宽度。
     * @param Length $height 对象的高度。
     */
    public function __construct(
        public Weight $weight,
        public Length $length,
        public Length $width,
        public Length $height
    )
    {

    }

    /**
     * 获取对象重量。
     * @return Weight
     */
    public function getWeight(): Weight
    {
        return $this->weight;
    }

    /**
     * 获取对象的长度。
     * @return Length
     */
    public function getLength(): Length
    {
        return $this->length;
    }

    /**
     * 获取对象的宽度。
     * @return Length
     */
    public function getWidth(): Length
    {
        return $this->width;
    }

    /**
     * 获取对象的高度。
     * @return Length
     */
    public function getHeight(): Length
    {
        return $this->height;
    }


    /**
     * 计算并返回对象的周长。
     *
     * @return Length 对象的周长。
     */
    public function getPerimeter(): Length
    {
        $halfPerimeter = bcadd(
            $this->length->getNumber(),
            $this->width->getNumber(),
            self::SCALE
        );
        $halfPerimeter = bcadd($halfPerimeter, $this->height->getNumber(),self::SCALE);
        $fullPerimeter = bcmul($halfPerimeter , '2',self::SCALE);
        return new Length($fullPerimeter,LengthUnit::CM);
    }

    /**
     * 获取对象体积。
     *
     * @return string 获取对象体积。
     */
    public function getVolume(): string
    {
        $squ =  bcmul(
            bcmul($this->length->getNumber(LengthUnit::INCH), $this->width->getNumber(LengthUnit::INCH), self::SCALE), // 长宽积
            $this->height->getNumber(LengthUnit::INCH), //高
            self::SCALE
        );

        //转换成立方米
        return $squ;
    }

    /**
     * 获取体积种量
     *
     * @return Weight 获取对象表面积。
     */
    public function getVolumeWeight(): Weight
    {
        $volumeWeight = bcdiv($this->getVolume(),self::VOLUME_WEIGHT_SCALE,self::SCALE);
        return new Weight($volumeWeight,WeightUnit::KG);
    }
}