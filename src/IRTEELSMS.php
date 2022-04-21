<?php

namespace IRTEELSMS;


require_once 'api/IRTEELSMSAPI.php';

use IRTEELSMS\api\IRTEELSMSAPI;

class IRTEELSMS
{


   protected $url;
   protected $token;
   protected $sms_body;
   protected $client;



   public function __construct($url,$token,$sms_body){
	   
	  
       $this->url = $url;
	   $this->token = $token;
	   $this->sms_body = $sms_body;
	   $this->client = new IRTEELSMSAPI();

           


   }


    public function setUrl($url) {

       
        $this->url = $url;
    }
	
    public function getUrl() {

        return $this->url;
    }
	
    public function setToken($token) {

        $this->token = $token;

    }
	
    public function getToken() {

        return $this->token;
    }	
	
    public function setSmsBody($sms_body) {
        $this->sms_body = $sms_body;
       
    }
	
    public function getSmsBody() {

        return $this->sms_body;
    }	
	

    public function sms_send(){
		
                
		// Instantiate a new IRTEEL SMS API request
		//$client = new IRTEELSMSAPI();

    

		// Send SMS
		$response = $this->client->send_sms($this->sms_body,$this->url,$this->token);
		
                
                return $response;

    }

    //View an sms
    public function sms_view($uid){
		

        return $this->client->view_sms($this->url,$this->token,$uid);

    }

    //View all sms
    public function sms_views(){
		
        return $this->client->view_smss($this->url,$this->token);

    }

    //Get sms unit
    public function sms_balance(){

   
		
        return $this->client->check_balance($this->url,$this->token);

    }

    //Get profile
    public function profile(){
		
        return $this->client->view_profile($this->url,$this->token);

    }


}
