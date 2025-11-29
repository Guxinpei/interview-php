<?php

namespace Roog\Kmc\Lib\Converse\WeightUnit;

class Weight implements WeightContract
{

    /**
     * 创建一个重量对象。
     * @param float|string $number
     * @param WeightUnit $unit
     */
    public function __construct(
        public float|string $number,
        public WeightUnit $unit = WeightUnit::POUND
    )
    {
        //检查重量是否为数字
        if (!is_numeric($this->number)) {
            throw new \InvalidArgumentException('重量必须为数字。');
        }

        //转换为String的目的是方便bcmath操作
        $this->number = (string) $this->number;
    }

    /**
     * 获取当前重量的值。
     * @param WeightUnit $unit
     * @return float
     */
    public function getNumber(WeightUnit $unit = WeightUnit::KG): float
    {
       //如果当前重量单位等于目标单位，则直接返回当前重量值
       if($unit === $this->unit) {
           return $this->number;
       }

       return $this->convert($unit);
    }

    /**
     * 将当前重量转换为指定的单位。
     * 思路为将任意类型转换为kg，然后根据目标单位进行转换。
     * @param WeightUnit $unit 目标重量单位。
     * @return string 转换后的重量值。
     */
    private function convert(WeightUnit $unit): string
    {
        //如果当前重量单位不是kg，则先转换为kg
        $number = $this->unit !== WeightUnit::KG ?
            $this->unit->toKg($this->number)
            : $this->number;

        //从kg转换为目标单位
        return $unit->kgTo($number);
    }
}