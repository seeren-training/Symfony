<?php

namespace App\Service\AppCore;

use App\Exception\InvalidFormException;
use Symfony\Component\Form\FormInterface;

class FormValidator
{

    /**
     * @param FormInterface $form
     * @return FormInterface
     *
     * @throws InvalidFormException
     */
    public function validate(FormInterface $form): FormInterface
    {
        if ($form->isSubmitted() && $form->isValid()) {
            return $form;
        }
        throw new InvalidFormException();
    }

}