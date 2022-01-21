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
}