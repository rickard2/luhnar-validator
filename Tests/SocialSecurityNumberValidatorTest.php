<?php

use PHPUnit\Framework\TestCase;
use Rickard2\LuhnarValidator\SocialSecurityNumber;
use Rickard2\LuhnarValidator\SocialSecurityNumberValidator;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Exception\MissingOptionsException;

class SocialSecurityNumberValidatorTest extends TestCase
{
    protected ExecutionContextInterface $context;
    protected SocialSecurityNumberValidator $validator;

    protected function setUp(): void
    {
        $this->context   = $this->getMockBuilder(ExecutionContextInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->validator = new SocialSecurityNumberValidator();
        $this->validator->initialize($this->context);
    }

    public function testValid()
    {
        $constraint = new SocialSecurityNumber(['countryCode' => 'se']);

        $this->context->expects($this->never())->method('addViolation');

        $this->validator->validate('9909193766', $constraint);
    }

    public function testInvalid()
    {
        $constraint = new SocialSecurityNumber(['countryCode' => 'se']);

        $this->context->expects($this->once())->method('addViolation');

        $this->validator->validate('9909193767', $constraint);
    }

    public function testRequiresCountry()
    {
        $this->expectException(MissingOptionsException::class);
        new SocialSecurityNumber([]);
    }
}