<?php

namespace TravelboxMailchimpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CampaignType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('status')
            ->add('sendTime', 'datetime')
            ->add('subjectLine')
            ->add('title')
            ->add('replyTo')
            ->add('toName')
            ->add('fromName')
            ->add('apikey')
            ->add('listid')
            ->add('server')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TravelboxMailchimpBundle\Entity\Campaign'
        ));
    }
}