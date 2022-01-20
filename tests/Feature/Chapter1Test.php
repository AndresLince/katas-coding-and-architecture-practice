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
}
?>