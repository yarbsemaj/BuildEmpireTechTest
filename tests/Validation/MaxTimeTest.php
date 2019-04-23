<?php

namespace Validation;

use PHPUnit\Framework\TestCase;
use Validators\MaxTime;

class MaxTimeTest extends TestCase
{
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = new MaxTime('09:00');
    }

    public function testValidate()
    {
        $this->assertEquals(false, $this->validator->validate('foo', '09:01'));

        $this->assertEquals(true, $this->validator->validate('foo', '00:00'));
        $this->assertEquals(true, $this->validator->validate('foo', '08:59'));
    }
}
