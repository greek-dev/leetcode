<?php

namespace src;

/**
 * Class Solution
 */
class Solution
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
     * https://leetcode.com/problems/add-two-numbers
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
    {
        $carry = 0;
        $link = $result = new ListNode(0);

        while ($l1 != null || $l2 != null) {
            $sum = $carry;
            if ($l1 != null) {
                $sum += $l1->val;
            }
            if ($l2 != null) {
                $sum += $l2->val;
            }
            $carry = (int)($sum / 10);
            $link->next = new ListNode(($sum % 10));
            $link = $link->next;

            $l1 = $l1 ? $l1->next : null;
            $l2 = $l2 ? $l2->next : null;
        }
        if ($carry) {
            $link->next = new ListNode($carry);
        }

        return $result->next;
    }

    /**
     * https://leetcode.com/problems/longest-substring-without-repeating-characters
     * @param string $s
     * @return int
     */
    function lengthOfLongestSubstring(string $s): int
    {
        $j = 0;
        $count = 0;
        $storage = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (key_exists($s[$i], $storage)) {
                $j = max($storage[$s[$i]] + 1, $j);
                unset($storage[$s[$i]]);
            }
            $storage[$s[$i]] = $i;
            $count = max($count, $i + 1 - $j);
        }
        return $count;
    }

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
}