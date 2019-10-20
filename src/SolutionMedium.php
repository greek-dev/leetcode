<?php

namespace src;

/**
 * Class SolutionMedium
 * @package src
 */
class SolutionMedium
{
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
     * https://leetcode.com/problems/product-of-array-except-self
     * @param array $nums
     * @return array
     */
    function productExceptSelf(array $nums): array
    {
        $result = [];
        $count = count($nums);

        $result[0] = 1;
        for ($i = 1; $i < $count; $i++) {
            $result[$i] = $nums[$i - 1] * $result[$i - 1];
        }
        $tmp = 1;
        for ($i = $count - 1; $i >= 0; $i--) {
            $result[$i] *= $tmp;
            $tmp *= $nums[$i];
        }
        return $result;
    }
}