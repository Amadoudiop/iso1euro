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

class IsZipCodeValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {

        $url = "https://geo.api.gouv.fr/communes?codePostal=".urlencode($value);

        $result = file_get_contents($url);
        $result = json_decode($result, true);

        if (empty($result)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ int }}', $value)
                ->addViolation();
        }
    }
}