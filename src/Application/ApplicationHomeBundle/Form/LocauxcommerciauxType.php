<?php

namespace Application\ApplicationHomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LocauxcommerciauxType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text')
            ->add('superficie','number')
            ->add('prix','number')
            ->add('texte','textarea')
            ->add('region')
            ->add('typeAnnonce')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\ApplicationHomeBundle\Entity\Locauxcommerciaux'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'application_applicationhomebundle_locauxcommerciaux';
    }
}
