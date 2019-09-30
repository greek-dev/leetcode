<?php

namespace src;
/**
 * Class SolutionEasy
 * @package src
 */
class SolutionEasy
{
    /**
     * https://leetcode.com/problems/two-sum
     * @param array $nums
     * @param int $target
     * @return array
     */
    public function twoSum(array $nums, int $target): array
    {
        $data = [];
        for ($i = 0; $i < count($nums); $i++) {
            $searchNum = $target - $nums[$i];
            if (isset($data[$searchNum])) {
                return [$data[$searchNum], $i];
            }
            $data[$nums[$i]] = $i;
        }
        return [];
    }

    /**
     * https://leetcode.com/problems/reverse-integer/
     * @param int $x
     * @return int
     */
    public function reverse(int $x): int
    {
        $result = 0;
        $max = pow(2, 31);
        while ($x != 0) {
            $result = ($result * 10) + ($x % 10);
            if ($result < -$max || $result >= $max) {
                return 0;
            }
            $x = (int)($x / 10);
        }
        return (int)$result;
    }

    /**
     * https://leetcode.com/problems/palindrome-number
     * @param $x
     * @return bool
     */
    function isPalindrome($x): bool
    {
        if ($x < 0 || ($x != 0 && $x % 10 == 0)) {
            return false;
        }
        $y = 0;
        while ($x > $y) {
            $y = ($y * 10) + ($x % 10);
            if ((int)($x / 10) < $y) {
                break;
            }
            $x = (int)($x / 10);
        }

        return $x == $y;
    }

    public function romanToInt($s): int
    {
        $list = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000,
        ];
        $result = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            $current = $list[$s[$i]];
            $next = $list[$s[$i + 1]];
//            if ($current * 5 == $next || $current * 10 == $next) {
            if ($current < $next) {
                $result += $next - $current;
                $i++;
            }else{
                $result += $current;
            }
        }
        return $result;
    }
}