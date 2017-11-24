<?php
namespace AppBundle\Validator\Constraints;
use Symfony\Component\Validator\Constraint;
/**
 * @Annotation
 */
class IsZipCode extends Constraint
{
    public $message = 'Le code postal {{ int }} n\'est pas valide';
    public function validatedBy()
    {
        return IsZipCodeValidator::class;
    }
}