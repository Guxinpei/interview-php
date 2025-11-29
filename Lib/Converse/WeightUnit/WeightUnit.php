<?php

namespace Roog\Kmc\Lib\Converse\WeightUnit;

/**
 * 表示重量单位的枚举类。
 *
 * 此枚举定义了两种重量单位：
 * - KG：表示公斤。
 * - POUND：表示磅。
 * 可拓展，转换的基本思路为 任意单位 ---> kg ----> 任意单位
 */
enum WeightUnit: string
{

    private const int SCALE = 5;

    /**
     * 表示公斤。
     */
     case KG = 'kg';

    /**
     * 表示磅。
     */
     case POUND = 'lb';


     public function toKg(float $value): string
     {
         return match ($this) {
             self::KG => $value,
             self::POUND => bcmul($value , '0.454', self::SCALE),
         };
     }

     public function kgTo(float $value): string
     {
         return match ($this) {
             self::KG => $value,
             self::POUND => bcdiv($value , '0.454', self::SCALE),
         };
     }

}