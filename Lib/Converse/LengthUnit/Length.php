<?php

namespace Roog\Kmc\Lib\Converse\LengthUnit;

class Length implements LengthContract
{

    private const int SCALE = 5;

    /**
     * 创建一个长度对象。
     * @param float|string $number
     * @param LengthUnit $unit
     */
    public function __construct(
        public float|string $number,
        public LengthUnit $unit = LengthUnit::INCH
    )
    {
        //检查长度是否为数字
        if (!is_numeric($this->number)) {
            throw new \InvalidArgumentException('长度必须为数字。');
        }

        //转换为String的目的是方便bcmath操作
        $this->number = (string) $this->number;
    }

    /**
     * 获取当前长度的值。
     * @param LengthUnit $unit
     * @return float
     */
    public function getNumber(LengthUnit $unit = LengthUnit::CM): float
    {
       //如果当前长度单位等于目标单位，则直接返回当前长度值
       if($unit === $this->unit) {
           return $this->number;
       }

       return $this->convert($unit);
    }

    /**
     * 将当前长度转换为指定的单位。
     * 思路为将任意类型转换为cm，然后根据目标单位进行转换。
     * @param LengthUnit $unit 目标长度单位。
     * @return string 转换后的长度值。
     */
    private function convert(LengthUnit $unit): string
    {
        //如果当前长度单位不是cm，则先转换为cm
        $number = $this->unit !== LengthUnit::CM ?
            $this->unit->toCm($this->number)
            : $this->number;

        if ($unit === LengthUnit::CM) {
            return $number;
        }

        //从cm转换为目标单位
        return $unit->cmTo($number);
    }
}