<?php

namespace Validation;

use PHPUnit\Framework\TestCase;
use Validators\Integer;

class IntegerTest extends TestCase
{
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = new Integer();
    }

    public function testValidate()
    {
        $this->assertEquals(true, $this->validator->validate('foo', 1));
        $this->assertEquals(true, $this->validator->validate('foo', 1.00));
        $this->assertEquals(true, $this->validator->validate('foo', '10'));
        $this->assertEquals(true, $this->validator->validate('foo', '10.00'));

        $this->assertEquals(false, $this->validator->validate('foo', 10.1));
        $this->assertEquals(false, $this->validator->validate('foo', '10.1'));
        $this->assertEquals(false, $this->validator->validate('foo', 'ten'));


    }
}
