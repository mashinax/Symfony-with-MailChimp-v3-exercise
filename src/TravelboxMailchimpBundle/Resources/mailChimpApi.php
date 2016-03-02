<?php
namespace TravelboxMailchimpBundle\Resources;

use TravelboxMailchimpBundle\Entity\Campaign;

/**
 * Created by PhpStorm.
 * User: davidmarkovitch
 * Date: 02/03/2016
 * Time: 12:23 AM
 */
class mailChimpApi
{
    private $mc_type;
    private $mc_status;
    private $mc_send_time;
    private $mc_subject_line;
    private $mc_title;
    private $mc_reply_to;
    private $mc_to_name;
    private $mc_from_name;
    private $apikey = 'ee020ccd789d9e545c2808030c29685f-us12';
    private $listid = 'd2fb3fca1a';
    private $server = 'us12';

    public function __construct($mc_type, $mc_status, $mc_send_time, $mc_subject_line, $mc_title, $mc_reply_to, $mc_to_name, $mc_from_name)
    {
        $this->mc_type = $mc_type;
        $this->mc_status = $mc_status;
        $this->mc_send_time = '2016-03-28T19:16:52+00:00';
        $this->mc_subject_line = $mc_subject_line;
        $this->mc_title = $mc_title;
        $this->mc_reply_to = $mc_reply_to;
        $this->mc_to_name = $mc_to_name;
        $this->mc_from_name = $mc_from_name;
    }

    /**
     * @Route("mc/campaign")
     */

    public function mcSendData()
    {
        $auth = base64_encode( 'user:'.$this->apikey );
        $data = array (
            'recipients' =>
                array (
                    'list_id' => $this->listid,
                ),
            'type' => $this->mc_type,
            'status' => $this->mc_status,
            'send_time' => $this->mc_send_time,
            'settings' =>
                array (
                    'subject_line' => $this->mc_subject_line,
                    'title' => $this->mc_title,
                    'reply_to' => $this->mc_reply_to,
                    'to_name' => $this->mc_to_name,
                    'from_name' => $this->mc_from_name,
                ),
        );
        $json_data = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://'.$this->server.'api.mailchimp.com/3.0/campaigns');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Basic '.$auth));
        curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/3.0');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        $result = curl_exec($ch);
        curl_close($ch);
        //$mc_data=json_decode($result);

        return $result;
    }
}