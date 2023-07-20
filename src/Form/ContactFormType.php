<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('objet')
            ->add('email')


            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                // Une des options les plus utilisées sur les formulaires est required, qui est par défaut à "true. Si vous voulez qu'un champ ne le soit pas, il faut passer required à false
                'required' => false
                ]
            )
            // 
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer le message'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
