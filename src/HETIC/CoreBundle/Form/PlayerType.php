<?php

namespace HETIC\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname',  TextType::class, array('label' => 'Nom'))
            ->add('firstname', TextType::class, array('label' => 'Prénom'))
            ->add('email',     TextType::class, array('label' => 'Email'))
            ->add('phone',     TextType::class, array('label' => 'Téléphone'))
            ->add('save',      SubmitType::class, array('label' => 'Envoyer'))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HETIC\CoreBundle\Entity\Player'
        ));
    }
}
