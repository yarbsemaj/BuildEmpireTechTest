<?php

namespace Validation;

use PHPUnit\Framework\TestCase;
use Validators\Min;

class MinTest extends TestCase
{
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = new Min(10);
    }

    public function testValidate()
    {
        $this->assertEquals(true, $this->validator->validate('foo', 15));
        $this->assertEquals(true, $this->validator->validate('foo', 10));
        $this->assertEquals(true, $this->validator->validate('foo', '10'));
        $this->assertEquals(true, $this->validator->validate('foo', '10.00'));

        $this->assertEquals(false, $this->validator->validate('foo', 9.99));
        $this->assertEquals(false, $this->validator->validate('foo', '9.99'));
    }
}
