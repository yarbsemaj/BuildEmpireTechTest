<?php

namespace Validation;

use PHPUnit\Framework\TestCase;
use Validators\Time;

class TimeTest extends TestCase
{
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = new Time();
    }

    public function testValidate()
    {
        $this->assertEquals(true, $this->validator->validate('foo', '10:31'));
        $this->assertEquals(true, $this->validator->validate('foo', '00:31'));
        $this->assertEquals(true, $this->validator->validate('foo', '13:00'));

        $this->assertEquals(false, $this->validator->validate('foo', '25:00'));
        $this->assertEquals(false, $this->validator->validate('foo', '10:61'));
        $this->assertEquals(false, $this->validator->validate('foo', 'ten oclock'));


    }
}
