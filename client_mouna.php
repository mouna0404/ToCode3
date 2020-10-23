<?php
 /** 
  @Description: Web service client
  This Script creates a client using NuSOAP php library. 
  @Author:  Neila BEN LAKHAL
  @Website: neila.benlakhal@github.io
 */
// Pull in the NuSOAP code
require_once('lib/nusoap.php');
	$error  = '';
	$result = array();
	$wsdl = "http://www.dneonline.com/calculator.asmx?wsdl";
		if(!$error){
			//create client object
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				 // Call the SOAP method
				$resultAdd = $client->call('Add', array('intA' => '100','intB' => '1250' ));
				// Display the result
				echo "<h2>ResultAdd<h2/>";
				print_r($resultAdd);

				 // Call the SOAP method
				$resultDivide = $client->call('Divide', array('intA' => '300','intB' => '2' ));
				// Display the result
				echo "<h2>ResultDivide<h2/>";
				print_r($resultDivide);
			  }
			  catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}	
// Display the request and response (SOAP messages)
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
// Display the debug messages
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
?>