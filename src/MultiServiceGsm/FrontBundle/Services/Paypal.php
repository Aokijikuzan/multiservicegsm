<?php
namespace MultiServiceGsm\FrontBundle\Services;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class Paypal {
	
	private $id = "Aby3PAF_Dt_3us1mb2Tf5HY2Vn0TJ2TL-xJV-gpVoDWHjbxtywGp9i4vTm_PKrvavkLppyKK0ooYW-Xk";
	private $secret ="ENReRQqnXLpOykG7E-aWGt5cA76sJUXvnOgQSKoifkA3kc80bXdjOxjJQlHKkbIHspXH2claiA7CvylG";
	private $endpoint = "https://api.sandbox.paypal.com/v1/" ;
	private $expProfileId =  "XP-JXNN-98UD-3QQJ-JA8Y" ;
	private $router;
	
	function __construct(Router $router, $user=null, $secret=null, $endpoint=null, $expProfileId = null){
		
		$this->router = $router;
		if ($user)	$this->user = $user;
		if ($secret) $this->secret = $secret;
		if ($endpoint) $this->endpoint = $endpoint;
		if ($expProfileId) $this->expProfileId = $expProfileId;
		
	}
	
	public function getAccessToken(){
		
		// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $this->endpoint. "" . "oauth2/token");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_USERPWD, $this->id . ":" . $this->secret);
		
		$headers = array();
		$headers[] = "Accept: application/json";
		$headers[] = "Accept-Language: en_US";
		$headers[] = "Content-Type: application/x-www-form-urlencoded";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		
		curl_close ($ch);
		
		//convertir resulat en array
		$resultArray = (array) json_decode($result);
		
		if (!$resultArray){
			die (' Erreur-1 Token');
		}else if (!empty($resultArray['error_description'])){
				die ($resultArray['error_description']);
			}
		
		return $resultArray;
	}
	
	
	public function getPaymentToken($montant, $articles){
		
		$accessToken = $this->getAccessToken()['access_token'];
		$ch = curl_init();
		
		$params = '{
		  "intent": "sale",
		  "redirect_urls":
		  {
		    "return_url": "http://127.0.0.1:8000/commande/confirme/",
		    "cancel_url": "http://127.0.0.1:8000/commande/echoue/"
		  },
		  "payer":
		  {
		    "payment_method": "paypal"
		  },
		  "transactions": [
		  {
		    "amount":
		    {
		      "total": "'.$montant.'",
		      "currency": "EUR",
			  "details":
			  {
				"subtotal": "'.$montant.'"
			  }
		    },
		    "item_list":
			{
			  "items": '. $articles.'
		    },
		    "description": "Coût du service"
		  }]
		}';
		
		//var_dump($params); die();
		
		
		curl_setopt($ch, CURLOPT_URL, $this->endpoint. "" ."payments/payment");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_POST, 1);
		
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
		
		$headers = array();
		$headers[] = "Content-Type: application/json";
		$headers[] = "Authorization: Bearer " . $accessToken;
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		
		//convertir resultat en array
		$resultArray = (array) json_decode($result);
		
		//var_dump($resultArray); die();

		if (!$resultArray){
			die (' Erreur-2');
		}else if (!empty($resultArray['error_description'])){
				die ($resultArray['error_description']);
			} else if (!empty($resultArray['name'])){
						die ('Error-2 '.$resultArray['name']);
					}
		
		return $resultArray;
	}
	
	public function getPaymentStatus ($payid){
		
		$accessToken = $this->getAccessToken()['access_token'];
		//$router = $this->container->get('router');
		
		// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $this->endpoint. "" ."payments/payment/".$payid);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		
		$headers = array();
		$headers[] = "Content-Type: application/json";
		$headers[] = "Authorization: Bearer " . $accessToken;
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		
		//convertir resultat en array
		$resultArray = (array) json_decode($result);
		
		if (!$resultArray){
			die (' Erreur-3');
		}else if (!empty($resultArray['error_description'])){
				die ($resultArray['error_description']);
			} else if (!empty($resultArray['name'])){
						die ('Error-3 '.$resultArray['name']);
					}
		
		return $resultArray;
	}
	
	
	public function executePayment($payid, $payer_id){
		
		$accessToken = $this->getAccessToken()['access_token'];
		
		
		// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$ch = curl_init();
		
		$params = '{"payer_id":"'.$payer_id.'"}';
		//var_dump($payer_id); die();
		
		curl_setopt($ch, CURLOPT_URL, $this->endpoint. "" ."payments/payment/".$payid."/execute/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params );
		curl_setopt($ch, CURLOPT_POST, 1);
		
		$headers = array();
		$headers[] = "Content-Type: application/json";
		$headers[] = "Authorization: Bearer ". $accessToken;
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		
		//convertir resultat en array
		$resultArray = (array) json_decode($result);
		
		return $resultArray;
	}
	
	public function profile (){
		
		$accessToken = $this->getAccessToken()['access_token'];
		
		
		// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payment-experience/web-profiles/XP-JXNN-98UD-3QQJ-JA8Y");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"name\": \"InesPhoneProfile\",\n  \"input_fields\": {\n  \"no_shipping\": 1,\n  \"address_override\": 1\n  },\n  \"flow_config\": {\n  \"landing_page_type\": \"login\",\n   \"user_action\": \"commit\"\n  }\n}");
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		
		
		$headers = array();
		$headers[] = "Content-Type: application/json";
		$headers[] = "Authorization: Bearer ". $accessToken;
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		
		
		$resultArray = (array) json_decode($result);
		
		return $resultArray;
	
	}
	
	public function profileList(){
		
		$accessToken = $this->getAccessToken()['access_token'];
		
		// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payment-experience/web-profiles");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


		$headers = array();
		$headers[] = "Content-Type: application/json";
		$headers[] = "Authorization: Bearer ". $accessToken;
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		
		$resultArray = (array) json_decode($result);
		
		return $resultArray;


	}
	
}