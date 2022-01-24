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
}
?>