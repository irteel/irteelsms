<?php

namespace IRTEELSMS\api;

class IRTEELSMSAPI
{

    /**
     * @param $sms_body
     * @return string
     *
     * Make your sms information for post
     */

    private function make_sms_body($sms_body){

        return json_encode($sms_body);
    }


    /**
     * @param $body
     * @return string
     *
     * Make your sms information for post
     */

    private function make_body($body){

        $fields = '';

        foreach ($body as $key => $value) {
            $fields .= urlencode($key) . '=' . $value . '&';
        }

        $fields=rtrim($fields,'&');

        return $fields;
    }


    /**
     * @param $url
     * @param $post_body
     * @return mixed
     *
     * Send request to server and get sms status
     *
     */
    private function send_server_response($url,$post_body,$token){

        /**
         * Do not supply $post_fields directly as an argument to CURLOPT_POSTFIELDS,
         * despite what the PHP documentation suggests: cUrl will turn it into in a
         * multipart formpost, which is not supported:
         */

		$curl = curl_init($url);
		$authorization = 'Authorization: Bearer '.$token;
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "Content-Type: application/json",
		   $authorization,
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		$data = $post_body;
		if($data !=''){
					
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);	
		}
		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		// Allowing cUrl functions 20 second to execute
		curl_setopt ($curl, CURLOPT_TIMEOUT, 20 );
		// Waiting 20 seconds while trying to connect
		curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, 20 );
		$response_string = curl_exec($curl);
		curl_close($curl);

                return $response_string;

    }




 /**
     * @param $url
     * @return mixed
     *
     * Send request to server and get sms status
     *
     */
    private function send_server_get($url,$body,$token){


                echo $body;

                $curl = curl_init($url);
		$authorization = 'Authorization: Bearer '.$token;
		$headers = array(
		   $authorization,
		);
		curl_setopt($curl, CURLOPT_URL, $url);


		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);



                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET"); 
                curl_setopt($curl, CURLOPT_POSTFIELDS,$body);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);



				//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		// Allowing cUrl functions 20 second to execute
		curl_setopt ($curl, CURLOPT_TIMEOUT, 20 );
		// Waiting 20 seconds while trying to connect
		curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, 20 );
		$response_string = curl_exec($curl);
		curl_close($curl);

                return $response_string;

    }





    /**
     * @param $sms_body
     * @param $url
     * @return mixed
     *
     * Send SMS Using API request
     */

    public function send_sms($sms_body, $url,$token){

        $uri=$url.'sms/send';
        $post_body=$this->make_sms_body($sms_body);

        $response=$this->send_server_response($uri,$post_body,$token);

        return $response;

    }




    /**
     * @param $uid
     * @param $url
     * @return mixed
     *
     * View an SMS for specific API Access
     *
     */

    public function view_sms($url,$token,$uid){
        
        $uri=$url.$uid;
        $body = null;

        $response=$this->send_server_get($uri,$body,$token);

        return $response;


    }
	
	
	
	
    /**
     * 
     * @param $url
     * @return mixed
     *
     * Get All message for specific API Access
     *
     */

    public function view_smss($url,$token){
        $body = null;
        $uri=$url.'sms';
        $response=$this->send_server_get($uri,$body,$token);

        return $response;


    }	



    /**
     * @param $url
     * @param $token
     * @return mixed
     *
     * Get sms unit for specific user 
     *
     */

    public function check_balance($url,$token){

        $body = null;
        $uri=$url.'balance';

     

        $response=$this->send_server_get($uri,$body,$token);

        return $response;


    }
	
	    /**
     * @param $token
     * @param $url
     * @return mixed
     *
     * Get profile for specific user
     *
     */

    public function view_profile($url,$token){


        $body = null;
        $uri=$url.'me';

        $response=$this->send_server_get($uri,$body,$token);

        return $response;


    }


}