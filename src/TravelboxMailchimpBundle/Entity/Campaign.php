<?php

namespace TravelboxMailchimpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campaign
 *
 * @ORM\Table(name="campaign")
 * @ORM\Entity(repositoryClass="TravelboxMailchimpBundle\Repository\CampaignRepository")
 */
class Campaign
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sendTime", type="datetime")
     */
    private $sendTime;

    /**
     * @var string
     *
     * @ORM\Column(name="subjectLine", type="string", length=255)
     */
    private $subjectLine;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="replyTo", type="string", length=255)
     */
    private $replyTo;

    /**
     * @var string
     *
     * @ORM\Column(name="toName", type="string", length=255)
     */
    private $toName;

    /**
     * @var string
     *
     * @ORM\Column(name="fromName", type="string", length=255)
     */
    private $fromName;

    /**
     * @var string
     *
     * @ORM\Column(name="apikey", type="string", length=255)
     */
    private $apikey;

    /**
     * @var string
     *
     * @ORM\Column(name="listid", type="string", length=255)
     */
    private $listid;

    /**
     * @var string
     *
     * @ORM\Column(name="server", type="string", length=255)
     */
    private $server;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Campaign
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Campaign
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set sendTime
     *
     * @param \DateTime $sendTime
     *
     * @return Campaign
     */
    public function setSendTime($sendTime)
    {
        $this->sendTime = $sendTime;

        return $this;
    }

    /**
     * Get sendTime
     *
     * @return \DateTime
     */
    public function getSendTime()
    {
        return $this->sendTime;
    }

    /**
     * Set subjectLine
     *
     * @param string $subjectLine
     *
     * @return Campaign
     */
    public function setSubjectLine($subjectLine)
    {
        $this->subjectLine = $subjectLine;

        return $this;
    }

    /**
     * Get subjectLine
     *
     * @return string
     */
    public function getSubjectLine()
    {
        return $this->subjectLine;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Campaign
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set replyTo
     *
     * @param string $replyTo
     *
     * @return Campaign
     */
    public function setReplyTo($replyTo)
    {
        $this->replyTo = $replyTo;

        return $this;
    }

    /**
     * Get replyTo
     *
     * @return string
     */
    public function getReplyTo()
    {
        return $this->replyTo;
    }

    /**
     * Set toName
     *
     * @param string $toName
     *
     * @return Campaign
     */
    public function setToName($toName)
    {
        $this->toName = $toName;

        return $this;
    }

    /**
     * Get toName
     *
     * @return string
     */
    public function getToName()
    {
        return $this->toName;
    }

    /**
     * Set fromName
     *
     * @param string $fromName
     *
     * @return Campaign
     */
    public function setFromName($fromName)
    {
        $this->fromName = $fromName;

        return $this;
    }

    /**
     * Get fromName
     *
     * @return string
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * Set apikey
     *
     * @param string $apikey
     *
     * @return Campaign
     */
    public function setApikey($apikey)
    {
        $this->apikey = $apikey;

        return $this;
    }

    /**
     * Get apikey
     *
     * @return string
     */
    public function getApikey()
    {
        return $this->apikey;
    }

    /**
     * Set listid
     *
     * @param string $listid
     *
     * @return Campaign
     */
    public function setListid($listid)
    {
        $this->listid = $listid;

        return $this;
    }

    /**
     * Get listid
     *
     * @return string
     */
    public function getListid()
    {
        return $this->listid;
    }

    /**
     * Set server
     *
     * @param string $server
     *
     * @return Campaign
     */
    public function setServer($server)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * Get server
     *
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }
}

