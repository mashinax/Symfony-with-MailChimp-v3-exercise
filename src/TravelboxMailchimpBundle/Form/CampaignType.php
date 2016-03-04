<?php

namespace TravelboxMailchimpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class CampaignType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', HiddenType::class, array('data' => 'regular',))
            ->add('status', HiddenType::class, array('data' => 'error',))
            ->add('sendTime', DateType::class)
            ->add('subjectLine')
            ->add('title')
            ->add('replyTo')
            ->add('toName', HiddenType::class, array('data' => 'any_name',))
            ->add('fromName')
            ->add('apikey')
            ->add('listid')
            ->add('server', HiddenType::class, array('data' => 'server',));
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
