<?php


namespace src\Algorithms;


use ArrayObject;

class NumArray
{
    protected $nums;

    /**
     * NumArray constructor.
     * @param array $nums
     */
    function __construct(array $nums)
    {
        $this->nums = $nums;
    }

    /**
     * @param int $i
     * @param int $val
     */
    function update(int $i, int $val): void
    {
        $this->nums[$i] = $val;
    }

    /**
     * @param Integer $i
     * @param Integer $j
     * @return Integer
     */
    function sumRange(int $i, int $j): int
    {
        $sum = 0;
        while ($i <= $j) {
            $sum += $this->nums[$i];
            ++$i;
        }
        return $sum;
    }
}