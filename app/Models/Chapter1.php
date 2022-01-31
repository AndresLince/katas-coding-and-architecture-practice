<?php
namespace App\Models;

use App\Models\Utils;
class Chapter1
{
    /**
     * Function that determines if a string has all unique characters
     * 
     * @param string $string it is the string to validate
     * 
     * @return bool
     * 
     */
    public static function validateHasUniqueCharacters(string $string): bool{
        if(strlen($string) > 256) {
            return false;
        }
        $arrayChars = [];
        for ($i = 0; $i < strlen($string); $i++) {
            if (isset($arrayChars[$string[$i]])) {
                return false;
            }
            $arrayChars[$string[$i]] = 1;
        }

        return true;
    }

    /**
     * Function that determines if a string is a permutation of other string
     * 
     * @param string $string1 string to validate if is a permutation of string2
     * 
     * @param string $string2 string to validate if string1 is a permutation of this
     * 
     * @return bool
     * 
     */
    public static function isPermutation(string $string1, string $string2): bool{
        $length1 = strlen($string1);
        $length2 = strlen($string2);
        if ($length1 != $length2) {
            return false;
        }

        $arrayString1 = [];
        for ($i=0; $i < $length1; $i++){
            $arrayString1[$string1[$i]] = 1;
        }

        for ($i = 0; $i < $length2; $i++) {
            if(!isset($arrayString1[$string2[$i]])) {
                return false;
            }
        }

        return true;
    }

    public static function urlify(string $phrase, int $phrase_length): string{
        $number_empty_spaces = Utils::countOfChars($phrase, 0, $phrase_length,' ');
        $new_index = ($phrase_length - 1) + $number_empty_spaces * 2;
        
        if ($new_index + 1 < strlen($phrase)) {
            $phrase = substr($phrase, 0, -1);
        }
        for($old_index = $phrase_length - 1; $old_index >= 0; $old_index -= 1) {
            if($phrase[$old_index] == ' ') {
                $phrase[$new_index]     = '0';
                $phrase[$new_index - 1] = '2';
                $phrase[$new_index - 2] = '%';
                $new_index -= 3;
            } else {
                $phrase[$new_index] = $phrase[$old_index];
                $new_index -= 1;
            }
        }
        return $phrase;
    }

    /**
     *
     * Function that validates if a string is a permutation of a palindrome
     *
     * @param string $string the string to validate
     *
     * @return bool
     *
     */
    public static function palindromePermutation(string $string): bool{
        $char_table = Utils::createCharTable($string);
        return Utils::validateMaxOdd($char_table, 1);
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

    /**
     * Function that perform basic string compression using the counts of repeated characters.
     *
     * @param string $string string to compress
     *
     * @return string
     *
     */
    public static function stringCompression(string $string): string{
        $solution_string = '';
        $letter_counter = 0;
        for($i = 0; $i < strlen($string); $i++) {
            $letter_counter++;
            if ($i == strlen($string) - 1 || $string[$i] != $string[$i + 1]) {
                $solution_string .= $string[$i].$letter_counter;
                $letter_counter = 0;
            }
        }
        if (strlen($solution_string) > strlen($string)) {
            $solution_string = $string;
        }
        return $solution_string;
    }
}
?>