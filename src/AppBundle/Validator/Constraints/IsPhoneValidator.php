<?php
/**
 * Created by PhpStorm.
 * User: creemson
 * Date: 14/11/17
 * Time: 23:47
 */

namespace AppBundle\Validator\Constraints;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class IsPhoneValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!preg_match("#^([-/+,;. ]?[0-9]{1}){6,12}$#", $value)) {
            //if (!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", (int)$value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ int }}', $value)
                ->addViolation();
        }
    }
}