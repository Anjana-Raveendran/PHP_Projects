<?php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ConstraintAge extends Constraint
{
    public $message = 'Not Valid';
}
?>
