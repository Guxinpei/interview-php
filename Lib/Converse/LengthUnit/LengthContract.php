<?php

namespace Roog\Kmc\Lib\Converse\LengthUnit;

/**
 * 长度接口
 * 目标是创建一个长度对象，并实现长度转换
 */
interface LengthContract
{

    /**
     * 构造方法
     *
     * @param float|string $number 数值或字符串
     * @param LengthUnit $unit 单位 默认为英寸
     * @return void
     */
    public function __construct(float|string $number, LengthUnit $unit = LengthUnit::INCH);

    /**
     * 获取长度
     *
     * @param LengthUnit $unit 单位
     * @return float
     */
    public function getNumber(LengthUnit $unit = LengthUnit::CM): float;

}