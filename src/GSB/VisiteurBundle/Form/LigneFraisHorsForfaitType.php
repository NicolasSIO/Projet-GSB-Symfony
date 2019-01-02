<?php

namespace GSB\VisiteurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use GSB\VisiteurBundle\Entity\FicheFrais;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class LigneFraisHorsForfaitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	->add('libelle', TextType::class)
        ->add('date', DateType::class,array('years'=>range(1980,2030)))
        ->add('montant', MoneyType::class)
        ->add('fichefrais', EntityType::class, array('class'=> FicheFrais::class,
'choice_label' => 'id'))
	->add('Enregistrer', SubmitType::class)
	->add('Annuler', ResetType::class);
         
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GSB\VisiteurBundle\Entity\LigneFraisHorsForfait'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gsb_visiteurbundle_lignefraishorsforfait';
    }


}