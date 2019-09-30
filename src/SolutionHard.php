<?php

namespace src;

/**
 * Class SolutionHard
 * @package src
 */
class SolutionHard
{
    /**
     * https://leetcode.com/problems/median-of-two-sorted-arrays
     * @param int[] $nums1
     * @param int[] $nums2
     * @return float
     */
    public function findMedianSortedArrays(array $nums1, array $nums2): float
    {
        //TODO: какую-то хрень сделал, переделать
        if ($nums1 && $nums2) {
            $array = array_merge($nums1, $nums2);
            sort($array);
        } else {
            $array = $nums1 ?: $nums2;
        }

        $length = count($array);
        if ($length % 2 == 1) {
            return $array[(int)($length / 2)];
        } else {
            return ($array[($length / 2) - 1] + $array[$length / 2]) / 2;
        }
    }

}