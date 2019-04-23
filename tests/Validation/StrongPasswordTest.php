<?php

namespace Validation;

use PHPUnit\Framework\TestCase;
use Validators\StrongPassword;

class StrongPasswordTest extends TestCase
{
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = new StrongPassword();
    }

    public function testValidate()
    {
        $this->assertEquals(true, $this->validator->validate('foo', 'IamAStrongPass123!£'));

        $this->assertEquals(false, $this->validator->validate('foo', '1234'));
        $this->assertEquals(false, $this->validator->validate('foo', '12345678'));
        $this->assertEquals(false, $this->validator->validate('foo', 'abcdefgh'));
        $this->assertEquals(false, $this->validator->validate('foo', 'ABCdefgh'));
        $this->assertEquals(false, $this->validator->validate('foo', 'ABCdef12'));
        $this->assertEquals(false, $this->validator->validate('foo', 'ABCdef""'));


    }
}
