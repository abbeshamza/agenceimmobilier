<?php

namespace Application\ApplicationHomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConfortType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ascenseur')
            ->add('adsl')
            ->add('antenneParabolique')
            ->add('balcon')
            ->add('cellier')
            ->add('chauffage')
            ->add('climatisation')
            ->add('cuisineEquipe')
            ->add('doubleVitrage')
            ->add('dressing')
            ->add('gazDeVille')
            ->add('interphone')
            ->add('jardinPrivatif')
            ->add('marbreBlanc')
            ->add('marbreThala')
            ->add('piscine')
            ->add('parking')
            ->add('placard')
            ->add('residenceGardee')
            ->add('syndic')
            ->add('telephone')
            ->add('videoSurveillance')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\ApplicationHomeBundle\Entity\Confort'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'application_applicationhomebundle_confort';
    }
}
