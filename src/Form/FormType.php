<?php

namespace App\Controller\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('nombre');
        $builder->add('email', EmailType::class);
        $builder->add('ciudad', ChoiceType::class, [
            'choices' => [
                'Lugo' =>'lugo',
                'Barcelona' => 'barcelona',
                'Bilbo' => 'bilbo',
                'Santiago de Compostela' => 'santiago de Compostela'
            ]
        ]);
        $builder->add('privacidad', CheckboxType::class, [
            'required' =>true,
        ]);
        $builder->add('enviar', SubmitType::class);
    }

}