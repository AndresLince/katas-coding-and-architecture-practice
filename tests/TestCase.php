<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public function validateAssertEqualsArray(array $array_inputs, $class, string $function_name, bool $expected_result) {
        if (method_exists($class, $function_name)) {
            foreach ($array_inputs as $string1 => $string2) {
                $result = $class::$function_name($string1, $string2);
                $this->assertEquals($result, $expected_result);
            }
        } else {
            $this->assertEquals(false, true);
        }
    }
}
