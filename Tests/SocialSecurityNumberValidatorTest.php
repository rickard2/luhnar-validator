<?php

use Rickard2\LuhnarValidator\SocialSecurityNumber;
use Rickard2\LuhnarValidator\SocialSecurityNumberValidator;

class SocialSecurityNumberValidatorTest extends PHPUnit_Framework_TestCase
{
    protected $context;

    /**
     * @var SocialSecurityNumberValidator
     */
    protected $validator;

    protected function setUp()
    {
        $this->context   = $this->getMock('Symfony\Component\Validator\ExecutionContext', array(), array(), '', false);
        $this->validator = new SocialSecurityNumberValidator();
        $this->validator->initialize($this->context);
    }

    public function testValid()
    {
        $constraint = new SocialSecurityNumber(array('countryCode' => 'se'));

        $this->context->expects($this->never())->method('addViolation');

        $this->validator->validate('9909193766', $constraint);
    }

    public function testInvalid()
    {
        $constraint = new SocialSecurityNumber(array('countryCode' => 'se'));

        $this->context->expects($this->once())->method('addViolation');

        $this->validator->validate('9909193767', $constraint);
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\MissingOptionsException
     */
    public function testRequiresCountry()
    {
        new SocialSecurityNumber(array());
    }
}