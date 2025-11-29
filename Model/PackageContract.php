<?php

namespace Roog\Kmc\Model;

use Roog\Kmc\Lib\Converse\LengthUnit\Length;
use Roog\Kmc\Lib\Converse\WeightUnit\Weight;
use Roog\Kmc\Lib\Converse\WeightUnit\WeightUnit;

interface PackageContract
{
    /**
     * 构造函数。
     * @param Weight $weight
     * @param Length $length
     * @param Length $width
     * @param Length $height
     */
    public function __construct(
        Weight $weight,
        Length $length,
        Length $width,
        Length $height
    );

    /**
     * 获取重量信息的方法。
     *
     * 此方法用于返回对象的重量值。
     *
     * @return Weight 返回对象的重量
     */
    public function getWeight(): Weight;

    /**
     * 获取尺寸信息方法。
     *
     * 此方法用于返回对象的尺寸信息。
     *
     * @return Length 尺寸信息
     */
    public function getLength(): Length;

    /**
     * 获取尺寸信息方法。
     *
     * 此方法用于返回对象的尺寸信息。
     *
     * @return Length 尺寸信息
     */
    public function getWidth(): Length;

    /**
     * 获取尺寸信息方法。
     *
     * 此方法用于返回对象的尺寸信息。
     *
     * @return Length 尺寸信息
     */
    public function getHeight(): Length;


    /**
     * 计算并返回周长。
     * @return Length 返回周长的长度。
     */
    public function getPerimeter(): Length;

    /**
     * 获取体积信息方法。
     *
     * 此方法用于返回对象的体积信息。
     *
     * @return string 尺寸信息 , 平方厘米
     */
    public function getVolume(): string;

    /**
     * 获取体积重量信息方法。
     *
     * 此方法用于返回对象的体积信息。
     *
     * @return Weight 体积重量
     */
    public function getVolumeWeight(): Weight;
}