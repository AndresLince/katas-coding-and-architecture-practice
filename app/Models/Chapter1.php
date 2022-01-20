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
}
?>