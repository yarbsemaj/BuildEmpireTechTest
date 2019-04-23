<?php

namespace Validation;

use PHPUnit\Framework\TestCase;
use Validators\Email;

class EmailTest extends TestCase
{
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = new Email();
    }

    public function testValidate()
    {
        $this->assertEquals(true, $this->validator->validate('foo', 'yarbsemaj@gmail.com'));
        $this->assertEquals(true, $this->validator->validate('foo', 'example12@example.tk'));

        $this->assertEquals(false, $this->validator->validate('foo', 'email'));
        $this->assertEquals(false, $this->validator->validate('foo', 'james@'));
        $this->assertEquals(false, $this->validator->validate('foo', '@bray.com'));
        $this->assertEquals(false, $this->validator->validate('foo', 'bray.com'));


    }
}
