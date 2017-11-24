<?php
namespace AppBundle\Validator\Constraints;
use Symfony\Component\Validator\Constraint;
/**
 * @Annotation
 */
class IsPhone extends Constraint
{
    public $message = 'Le numéro de téléphone {{ int }} n\'est pas valide';
    public function validatedBy()
    {
        return IsPhoneValidator::class;
    }
}