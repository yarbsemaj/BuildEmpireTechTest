<?php

namespace Validation;

use PHPUnit\Framework\TestCase;
use Validators\NotWeekendDay;

class NotWeekDayTest extends TestCase
{
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = new NotWeekendDay();
    }

    public function testValidate()
    {
        $this->assertEquals(true, $this->validator->validate('foo', '2019-10-10'));
        $this->assertEquals(true, $this->validator->validate('foo', '2019-10-10'));

        $this->assertEquals(false, $this->validator->validate('foo', '2019-04-21'));


    }
}
