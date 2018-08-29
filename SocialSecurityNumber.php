<?php

namespace Rickard2\LuhnarValidator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\MissingOptionsException;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
class SocialSecurityNumber extends Constraint
{

    public $message = 'This value is not a valid social security number';
    public $countryCode;

    public function __construct($options = null)
    {
        parent::__construct($options);

        if (!$this->countryCode) {
            throw new MissingOptionsException('Country must be given to validate social security numbers', array('countryCode'));
        }
    }

    public function validatedBy()
    {
        return get_class($this) . 'Validator';
    }
}