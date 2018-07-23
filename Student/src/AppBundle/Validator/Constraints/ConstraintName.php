<?php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ConstraintName extends Constraint
{
    public $message = 'Not Valid';
}
?>
