<?php

namespace src\Algorithms;

use SplStack;

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

    /**
     * https://leetcode.com/problems/roman-to-integer
     * @param $s
     * @return int
     */
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
            } else {
                $result += $current;
            }
        }
        return $result;
    }

    /**
     * https://leetcode.com/problems/longest-common-prefix
     * @param array $list
     * @return string
     */
    public function longestCommonPrefix(array $list): string
    {
        $prefix = '';
        $count = count($list);
        if (!$count) {
            return $prefix;
        }

        for ($i = 0; $i < strlen($list[0]); $i++) {
            for ($j = 0; $j < $count - 1; $j++) {
                if ($list[$j][$i] != $list[$j + 1][$i]) {
                    return $prefix;
                }
            }
            $prefix .= $list[0][$i];
        }
        return $prefix;
    }

    /**
     * https://leetcode.com/problems/valid-parentheses
     * @param string $s
     * @return bool
     */
    public function isValid(string $s): bool
    {
        $braces = [
            ')' => '(',
            '}' => '{',
            ']' => '[',
        ];

        $stack = new SplStack();
        for ($i = 0; $i < strlen($s); $i++) {
            if ($braces[$s[$i]]) {
                $stack->rewind();
                if ($stack->current() === $braces[$s[$i]]) {
                    $stack->pop();
                } else {
                    return false;
                }
            } else {
                $stack->push($s[$i]);
            }
        }
        return $stack->isEmpty();
    }

    /**
     * https://leetcode.com/problems/merge-two-sorted-lists
     * @param ListNode|null $l1
     * @param ListNode|null $l2
     * @return ListNode|null
     */
    public function mergeTwoLists(?ListNode $l1, ?ListNode $l2): ?ListNode
    {
//        if ($l1 === null) {
//            return $l2;
//        }
//        if ($l2 === null) {
//            return $l1;
//        }
//        if ($l1->val < $l2->val) {
//            $l1->next = $this->mergeTwoLists($l1->next, $l2);
//            return $l1;
//        } else {
//            $l2->next = $this->mergeTwoLists($l1, $l2->next);
//            return $l2;
//        }

        $link = $result = new ListNode(0);
        while ($l1 !== null && $l2 !== null) {
            if ($l1->val < $l2->val) {
                $link = $link->next = new ListNode($l1->val);
                $l1 = $l1->next;
            } else {
                $link = $link->next = new ListNode($l2->val);
                $l2 = $l2->next;
            }
        }
        $link->next = $l1 ?? $l2;
        return $result->next;
    }

    /**
     * https://leetcode.com/problems/remove-duplicates-from-sorted-array
     * @param array $nums
     * @return int
     */
    public function removeDuplicates(array &$nums): int
    {
        if ($count = count($nums)) {
            for ($i = 0, $j = 1; $j < $count; $j++) {
                if ($nums[$i] !== $nums[$j]) {
                    $nums[++$i] = $nums[$j];
                }
            }
            return $i + 1;
        }
        return 0;
    }

    /**
     * https://leetcode.com/problems/remove-element
     * @param array $nums
     * @param int $val
     * @return int
     */
    public function removeElement(array &$nums, int $val): int
    {
        reset($nums);
        while (current($nums) !== false) {
            if (current($nums) === $val) {
                unset($nums[key($nums)]);
                continue;
            }
            next($nums);
        }
        return count($nums);
    }

    /**
     * https://leetcode.com/problems/implement-strstr
     * @param string $haystack
     * @param string $needle
     * @return int
     */
    function strStr(string $haystack, string $needle): int
    {
        $needleLen = strlen($needle);
        $haystackLen = strlen($haystack);
        if (!$needleLen) return 0;
        if ($haystackLen < $needleLen) return -1;

        $jLen = intval($needleLen / 2) + $needleLen % 2;
        $jLastIx = $needleLen - 1;
        for ($i = 0; $i < $haystackLen; $i++) {
            for ($j = 0; $j < $jLen; $j++) {
                if ($haystack[$i + $j] !== $needle[$j] || $haystack[$i + $jLastIx - $j] !== $needle[$jLastIx - $j]) {
                    break;
                }
                if ($j == $jLen - 1) {
                    return $i;
                }
            }
        }
        return -1;
    }

    /**
     * https://leetcode.com/problems/search-insert-position
     * @param array $nums
     * @param int $target
     * @return int
     */
    public function searchInsert(array $nums, int $target): int
    {
        $min = 0;
        $max = count($nums) - 1;
        while ($min <= $max) {
            $mid = intval($min + ($max - $min) * 0.5);
            if ($nums[$mid] < $target) {
                $min = ++$mid;
            }else{
                $max = --$mid;
            }
        }
        return $min;
    }


}