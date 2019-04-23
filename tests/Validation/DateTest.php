<?php

namespace Validation;

use PHPUnit\Framework\TestCase;
use Validators\Date;

class DateTest extends TestCase
{
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = new Date();
    }

    public function testValidate()
    {
        $this->assertEquals(true, $this->validator->validate('foo', '2019-10-10'));
        $this->assertEquals(true, $this->validator->validate('foo', '1919-10-10'));
        $this->assertEquals(true, $this->validator->validate('foo', '1919-10-21'));

        $this->assertEquals(false, $this->validator->validate('foo', '2019-1-10'));
        $this->assertEquals(false, $this->validator->validate('foo', '2019-13-10'));
        $this->assertEquals(false, $this->validator->validate('foo', '2019-12-32'));
        $this->assertEquals(false, $this->validator->validate('foo', 'twenty 19'));


    }
}
