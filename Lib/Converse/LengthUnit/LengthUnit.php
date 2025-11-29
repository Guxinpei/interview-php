<?php

namespace Roog\Kmc\Lib\Converse\LengthUnit;

/**
 * 表示长度单位的枚举类。
 *
 * 此枚举定义了两种长度单位：
 * - CM：表示厘米。
 * - INCH：表示英寸。
 * 可拓展，转换的基本思路为 任意单位 ---> cm ----> 任意单位
 */
enum LengthUnit: string
{

    private const int SCALE = 5;

    /**
     * 表示厘米。
     */
     case CM = 'cm';

    /**
     * 表示英寸。
     */
     case INCH = 'in';


     public function toCm(float $value): string
     {
         return match ($this) {
             self::CM => $value,
             self::INCH => bcmul($value , '2.54',self::SCALE),
         };
     }

     public function cmTo(float $value): string
     {
         return match ($this) {
             self::CM => $value,
             self::INCH => bcdiv($value , '2.54',self::SCALE),
         };
     }

}
