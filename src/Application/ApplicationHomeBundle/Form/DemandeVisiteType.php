<?php

namespace Application\ApplicationHomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DemandeVisiteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text')
            ->add('email','email')
            ->add('tel','number')
            ->add('horaire')
            ->add('texte','textarea')
            ->add('annonce')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\ApplicationHomeBundle\Entity\DemandeVisite'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'application_applicationhomebundle_demandevisite';
    }
}
