<?php

namespace App\Models;

class Utils{
    /**
     * This function counts the number of times that a char is in a string
     * 
     * @param string $string the string to iterate looking for the char
     * 
     * @param int $start the point of start in the string param
     * 
     * @param int $end the point of end in the string param
     * 
     * @return int the number of times that the char is in the string
     */
    public static function countOfChars(string $string, int $start, int $end, string $target): int{
        $counter = 0;
        for($i = $start; $i < $end; $i++) {
            if($string[$i] == $target) {
                $counter++;
            }
        }
        return $counter;
    }
    /**
     *
     * Function that creates an associative array with the count of chars of a string
     *
     * @param string $string the string to count
     *
     * @return array
     *
     * example: array('x' => 1,'y' => 2, 'z' => 2)
     *
     */
    public static function createCharTable(string $string): array{
        $string = strtolower($string);
        $char_table = [];
        for ($i = 0;$i < strlen($string); $i++) {
            if ($string[$i] == ' ') {
                continue;
            }
            if (isset($char_table[$string[$i]])) {
                $char_table[$string[$i]]++;
            } else {
                $char_table[$string[$i]] = 1;
            }
        }
        return $char_table;
    }

    /**
     *
     * Function that validates if an associative array has more than determined odd number
     *
     * @param array $char_table the char array to validate
     *
     * @param int $max_valid_odd the number of max odd numbers
     *
     * example: array('x' => 1,'y' => 2, 'z' => 2)
     *
     * @return bool
     *
     */
    public static function validateMaxOdd(array $char_table,int $max_valid_odd) :bool{
        $odd_counter = 0;
        foreach ($char_table as $item) {
            if ($item % 2 != 0) {
                $odd_counter++;
                if ($odd_counter > $max_valid_odd) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Function that validates if the $string2 is the result of insert a character to the $string1
     * Its validate if there are no more than 1 difference between the two strings
     *
     * @param string $string1 The first string
     *
     * @param string $string2 The second string
     *
     * @return bool
     *
     */
    public static function isOneInsertAway(string $string1,string $string2): bool{
        $index2 = 0;
        $index1 = 0;
        while($index1 < strlen($string1) && $index2 < strlen($string2)) {
            if ($string1[$index1] != $string2[$index2]) {
                if ($index1 != $index2) {
                    return false;
                }
            } else {
                $index1++;
            }
            $index2++;
        }
        return true;
    }

    /**
     * Function that validates if a string is the result of do and edition of other
     * Its validate if there are no more than 1 difference between the two strings
     *
     * @param $string 1 The first string
     *
     * @param $string2 2 The second string
     *
     * @return bool
     *
     */
    public static function isOneEditAway(string $string1,string $string2): bool{
        $different = false;
        for($i = 0;$i < strlen($string1); $i++) {
            if ($string1[$i] != $string2[$i]) {
                if ($different) {
                    return false;
                }
                $different = true;
            }
        }
        return true;
    }
    

    /**
     * Function that validates if a string is one edit away of other
     *
     * @param string $string1 the string to compare with string 2
     *
     * @param string $string2 thes string to compare with string 1
     *
     * @return bool
     *
     */
    public static function validateOneEditAway($string1, $string2): bool{
        $length1 = strlen($string1);
        $length2 = strlen($string2);
        if ($length1 + 1 == $length2) {
            return Utils::isOneInsertAway($string1,$string2);
        } else if ($length2 + 1 == $length1) {
            return Utils::isOneInsertAway($string2,$string1);
        } else if ($length2 == $length1) {
            return Utils::isOneEditAway($string1,$string2);
        }
        return false;
    }
}