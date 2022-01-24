<?php

use App\Models\Chapter1;
use Tests\TestCase;

class Chapter1Test extends TestCase
{
    /** @test */
    public function has_unique_characters() {
        $string = 'abcdef';
        $validation = Chapter1::validateHasUniqueCharacters($string);
        $this->assertEquals($validation,true);
    }

    /** @test */
    public function has_not_unique_characters() {
        $string = 'abcdefgqc';
        $validation = Chapter1::validateHasUniqueCharacters($string);
        $this->assertEquals($validation, false);
    }

    /** @test */
    public function is_permutation() {
        $string1 = 'abcd';
        $string2 = 'acbd';
        $validation = Chapter1::isPermutation($string1, $string2);
        $this->assertEquals($validation, true);
    }

    /** @test */
    public function is_not_permutation() {
        $string1 = 'abcs';
        $string2 = 'abcd';
        $validation = Chapter1::isPermutation($string1, $string2);
        $this->assertEquals($validation,false);
    }

    /** @test */
    public function is_correct_urlified() {
        $string = 'Mr John Smith     ';
        $string_result = 'Mr%20John%20Smith';
        $result = Chapter1::urlify($string, 13);
        $this->assertEquals($string_result, $result);
    }

    /** @test */
    public function is_a_palindrome_permutation() {
        $string = 'Tact Coa';
        $result = Chapter1::palindromePermutation($string);
        $this->assertEquals($result, true);
    }

    /** @test */
    public function is_not_a_palindrome_permutation() {
        $string = 'Tact Cota';
        $result = Chapter1::palindromePermutation($string);
        $this->assertEquals($result, false);
    }

    /** @test */
    public function is_one_edit_away() {
        $string1 = 'pale';
        $string2 = 'bale';
        $result = Chapter1::validateOneEditAway($string1, $string2);
        $this->assertEquals($result, true);

        $string1 = 'pales';
        $string2 = 'pale';
        $result = Chapter1::validateOneEditAway($string1, $string2);
        $this->assertEquals($result, true);

        $string1 = 'pale';
        $string2 = 'ple';
        $result = Chapter1::validateOneEditAway($string1, $string2);
        $this->assertEquals($result, true);

        $string1 = 'pal';
        $string2 = 'pale';
        $result = Chapter1::validateOneEditAway($string1, $string2);
        $this->assertEquals($result, true);

        $string1 = 'pale';
        $string2 = 'pal';
        $result = Chapter1::validateOneEditAway($string1, $string2);
        $this->assertEquals($result, true);
    }

    /** @test */
    public function is_not_one_edit_away() {
        $string1 = 'pale';
        $string2 = 'bake';
        $result = Chapter1::validateOneEditAway($string1, $string2);
        $this->assertEquals($result, false);

        $string1 = 'raton';
        $string2 = 'rata';
        $result = Chapter1::validateOneEditAway($string1, $string2);
        $this->assertEquals($result, false);
        $string1 = 'raton';
        $string2 = 'ratao';
        $result = Chapter1::validateOneEditAway($string1, $string2);
        $this->assertEquals($result, false);
    }
}
?>