<?php

namespace IRTEELSMS\Api;

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
     * @param $url
     * @param $post_body
     * @return mixed
     *
     * Send request to server and get sms status
     *
     */
    private function send_server_response($gateway_url,$data,$token,$methode){

        /**
         * Do not supply $post_fields directly as an argument to CURLOPT_POSTFIELDS,
         * despite what the PHP documentation suggests: cUrl will turn it into in a
         * multipart formpost, which is not supported:
         */


        try {
        
			$curl = curl_init($gateway_url);
			

			$authorization = 'Authorization: Bearer '.$token;
			curl_setopt($curl, CURLOPT_URL, $gateway_url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
					
			
			if($methode !='POST'){
				
				curl_setopt($curl, CURLOPT_HTTPGET, 1);

			}else{
				
				curl_setopt($curl, CURLOPT_POST, 1);		
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);	
							
				
			}

			$headers = array(
			   "Content-Type: application/json",
			   $authorization,
			);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

			//for debug only!
			//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			// Allowing cUrl functions 20 second to execute
			//curl_setopt ($curl, CURLOPT_TIMEOUT, 20 );
			// Waiting 20 seconds while trying to connect
			//curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, 20 );
			
			
			$response_string = curl_exec($curl);
			
			if (curl_errno($curl)) {
			
				 $output = curl_error($curl);
				}
			
			curl_close($curl);

			 return $response_string;



			 //var_dump($output);

        }catch (Exception $exception){
		 
             echo $exception->getMessage();
		 
            }
    }





    /**
     * @param $sms_body
     * @param $url
     * @return mixed
     *
     * Send SMS Using API request
     */

    public function send_sms($sms_body,$url,$token){
        
		$gateway_url = $url .'sms/send';
       
        $post_body=$this->make_sms_body($sms_body);

        $response=$this->send_server_response($gateway_url,$post_body,$token,'POST');

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
        
        
       $gateway_url = $url.$uid;

        $response=$this->send_server_response($gateway_url,'',$token,'GET');

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
        
        $gateway_url = $url.'sms';
        $response=$this->send_server_response($gateway_url,'',$token,'GET');

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

        
        $gateway_url=$url.'balance';

     

        $response=$this->send_server_response($gateway_url,'',$token,'GET');

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



        $gateway_url = $url .'me';



        $response=$this->send_server_response($gateway_url,'',$token,'GET');

        return $response;


    }


}