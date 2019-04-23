<?php

namespace Validation;

use PHPUnit\Framework\TestCase;
use Validators\Max;

class MaxTest extends TestCase
{
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = new Max(10);
    }

    public function testValidate()
    {
        $this->assertEquals(true, $this->validator->validate('foo', 5));
        $this->assertEquals(true, $this->validator->validate('foo', -5));
        $this->assertEquals(true, $this->validator->validate('foo', 10));
        $this->assertEquals(true, $this->validator->validate('foo', '10'));
        $this->assertEquals(true, $this->validator->validate('foo', '10.00'));

        $this->assertEquals(false, $this->validator->validate('foo', 10.1));
        $this->assertEquals(false, $this->validator->validate('foo', '10.1'));
    }
}
