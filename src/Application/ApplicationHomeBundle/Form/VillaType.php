<?php

namespace Application\ApplicationHomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VillaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text')
            ->add('superficieTerrain','number')
            ->add('surfaceBatie','number')
            ->add('nbrEtage','number')
            ->add('nbrChambre','number')
            ->add('nbrSalon','number')
            ->add('nbrSalleAMange','number')
            ->add('nbrSalleDeBain','number')
            ->add('prix','number')
            ->add('texteAnnonce','textarea')
            ->add('typeAnnonce')
            ->add('region')
            ->add('confort','textarea')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\ApplicationHomeBundle\Entity\Villa'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'application_applicationhomebundle_villa';
    }
}
