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

    public function validateAssertEqualsArrayInputsAndResults(array $array_inputs_and_results, $class, string $function_name) {
        if (method_exists($class, $function_name)) {
            foreach ($array_inputs_and_results as $input => $result) {
                $result = $class::$function_name($input);
                $this->assertEquals($result, $result);
            }
        } else {
            $this->assertEquals(false, true);
        }
    }
}
