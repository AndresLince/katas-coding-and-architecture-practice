<?php
namespace App\Models;

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
}
?>