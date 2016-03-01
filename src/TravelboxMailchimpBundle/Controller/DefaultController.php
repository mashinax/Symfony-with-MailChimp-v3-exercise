<?php

namespace TravelboxMailchimpBundle\Controller;

use TravelboxMailchimpBundle\Entity\Campaign;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {

        $camp = new Campaign();
        $form = $this->createFormBuilder($camp)
            ->add('type')
            ->add('status')
            ->add('subjectLine')
            ->add('title')
            ->add('replyTo')
            ->add('toName')
            ->add('fromName')
            ->add('apikey')
            ->add('listid')
            ->add('server')
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        return $this->render('TravelboxMailchimpBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
