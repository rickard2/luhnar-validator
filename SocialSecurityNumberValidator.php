<?php

namespace Rickard2\LuhnarValidator;

use Rickard2\Luhnar\Validator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class SocialSecurityNumberValidator extends ConstraintValidator
{

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed      $value      The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @api
     */
    public function validate($value, Constraint $constraint)
    {
        /** @var SocialSecurityNumber $constraint */

        $validator = new Validator();

        try {
            if (!$validator->validate($value, $constraint->countryCode)) {
                $this->context->addViolation($constraint->message, array('%string%' => $value));
            }
        } catch (\Exception $e) {

        }
    }
}