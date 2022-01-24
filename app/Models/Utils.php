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
}