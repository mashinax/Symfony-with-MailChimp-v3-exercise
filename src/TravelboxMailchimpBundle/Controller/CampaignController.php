<?php

namespace TravelboxMailchimpBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use TravelboxMailchimpBundle\Entity\Campaign;
use TravelboxMailchimpBundle\Form\CampaignType;
use TravelboxMailchimpBundle\Resources\mailChimpApi;

/**
 * Campaign controller.
 *
 * @Route("/campaign")
 */
class CampaignController extends Controller
{
    /**
     * Lists all Campaign entities.
     *
     * @Route("/", name="campaign_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $campaigns = $em->getRepository('TravelboxMailchimpBundle:Campaign')->findAll();

        return $this->render('campaign/index.html.twig', array(
            'campaigns' => $campaigns,
        ));
    }

    /**
     * Creates a new Campaign entity.
     *
     * @Route("/new", name="campaign_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $campaign = new Campaign();
        $form = $this->createForm('TravelboxMailchimpBundle\Form\CampaignType', $campaign);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mc = new mailChimpApi($campaign->getType(), $campaign->getStatus(), $campaign->getSendTime(), $campaign->getSubjectLine(), $campaign->getTitle(), $campaign->getReplyTo(), $campaign->getToName(), $campaign->getFromName());
            $ms_result = $mc->mcSendData();
            //$campaign->setStatus($ms_result);

            $em = $this->getDoctrine()->getManager();
            $em->persist($campaign);
            $em->flush();

            return $this->redirectToRoute('campaign_show', array('id' => $campaign->getId()));
            //return $this->redirectToRoute('campaign_show', var_dump($ms_result));
        }

        return $this->render('campaign/new.html.twig', array(
            'campaign' => $campaign,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Campaign entity.
     *
     * @Route("/{id}", name="campaign_show")
     * @Method("GET")
     */
    public function showAction(Campaign $campaign)
    {
        $deleteForm = $this->createDeleteForm($campaign);

        return $this->render('campaign/show.html.twig', array(
            'campaign' => $campaign,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Campaign entity.
     *
     * @Route("/{id}/edit", name="campaign_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Campaign $campaign)
    {
        $deleteForm = $this->createDeleteForm($campaign);
        $editForm = $this->createForm('TravelboxMailchimpBundle\Form\CampaignType', $campaign);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($campaign);
            $em->flush();

            return $this->redirectToRoute('campaign_edit', array('id' => $campaign->getId()));
        }

        return $this->render('campaign/edit.html.twig', array(
            'campaign' => $campaign,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Campaign entity.
     *
     * @Route("/{id}", name="campaign_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Campaign $campaign)
    {
        $form = $this->createDeleteForm($campaign);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($campaign);
            $em->flush();
        }

        return $this->redirectToRoute('campaign_index');
    }

    /**
     * Creates a form to delete a Campaign entity.
     *
     * @param Campaign $campaign The Campaign entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Campaign $campaign)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('campaign_delete', array('id' => $campaign->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
