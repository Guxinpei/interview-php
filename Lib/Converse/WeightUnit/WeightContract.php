<?php

namespace Roog\Kmc\Lib\Converse\WeightUnit;

/**
 * 重量接口
 * 目标是创建一个重量对象，并实现重量转换
 */
interface WeightContract
{

    /**
     * 构造方法
     *
     * @param float|string $number 数值或字符串
     * @param WeightUnit $unit 单位 默认为磅
     * @return void
     */
    public function __construct(float|string $number, WeightUnit $unit = WeightUnit::POUND);

    /**
     * 获取重量
     *
     * @param WeightUnit $unit 单位
     * @return float
     */
    public function getNumber(WeightUnit $unit = WeightUnit::KG): float;

}