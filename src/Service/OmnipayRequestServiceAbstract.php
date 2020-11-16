<?php

   namespace Grayl\Omnipay\Common\Service;

   use Grayl\Omnipay\Common\Entity\OmnipayGatewayDataAbstract;
   use Grayl\Omnipay\Common\Entity\OmnipayRequestDataAbstract;
   use Grayl\Omnipay\Common\Entity\OmnipayResponseDataAbstract;
   use Omnipay\Common\CreditCard;
   use Omnipay\Common\Message\AbstractRequest;
   use Omnipay\Common\Message\AbstractResponse;

   /**
    * Abstract class OmnipayRequestServiceAbstract
    * The abstract class for all Omnipay payment request services
    * Note: This abstract class contains ALL omnipay request functions
    * Note: Individual gateways will build their requests by extending this class and calling the functions below
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayRequestServiceAbstract implements OmnipayRequestServiceInterface
   {

      /**
       * Sends an authorize request to the gateway
       *
       * @param OmnipayGatewayDataAbstract $gateway_data The OmnipayGatewayDataAbstract entity to send the request through
       * @param OmnipayRequestDataAbstract $request_data The OmnipayRequestDataAbstract to send
       *
       * @return OmnipayResponseDataAbstract
       * @throws \Exception
       */
      public function sendAuthorizeRequestData ( $gateway_data,
                                                 $request_data ): object
      {

         // Make sure the gateway supports the authorization method
         if ( ! $gateway_data->getAPI()
                             ->supportsAuthorize() ) {
            // Action not supported
            throw new \Exception( "Gateway does not support authorize method" );
         }

         // Check for offsite URLS
         $this->translateGatewayOffsiteURLs( $request_data,
                                             $request_data->getOffsiteURLs() );

         // Create the request
         /* @var $api_request AbstractRequest */
         $api_request = $gateway_data->getAPI()
                                     ->authorize( $request_data->getMainParameters() );

         // If there are credit card parameters for this request
         if ( ! empty( $request_data->getCreditCardParameters() ) ) {
            // Set the card parameters into a new object
            $api_request->setCard( new CreditCard( $request_data->getCreditCardParameters() ) );
         }

         // Set the item parameters
         $api_request->setItems( $request_data->getItems() );

         // Send the request to the api
         /* @var $response AbstractResponse */
         $response = $api_request->send();

         // Determine the correct action
         $action = ( $response->isRedirect() ? 'redirect' : $request_data->getAction() );

         // Return a new response entity with the action specified
         return $this->newResponseDataEntity( $response,
                                              $gateway_data->getGatewayName(),
                                              $action,
                                              [ 'amount' => $request_data->getAmount() ] );
      }


      /**
       * Confirms receipt of an offsite authorization with the gateway
       * ONLY used by offsite gateways
       *
       * @param OmnipayGatewayDataAbstract $gateway_data The OmnipayGatewayDataAbstract entity to send the request through
       * @param OmnipayRequestDataAbstract $request_data The OmnipayRequestDataAbstract to send
       *
       * @return OmnipayResponseDataAbstract
       * @throws \Exception
       */
      public function sendCompleteAuthorizeRequestData ( $gateway_data,
                                                         $request_data ): object
      {

         // Make sure the gateway supports complete authorization method
         if ( ! $gateway_data->getAPI()
                             ->supportsCompleteAuthorize() ) {
            // Action not supported
            throw new \Exception( "Gateway does not support complete authorize method" );
         }

         // Create the request
         /* @var $api_request AbstractRequest */
         $api_request = $gateway_data->getAPI()
                                     ->completeAuthorize( $request_data->getMainParameters() );

         // Send the request to the api
         /* @var $response AbstractResponse */
         $response = $api_request->send();

         // Determine the correct action
         $action = ( $response->isRedirect() ? 'redirect' : $request_data->getAction() );

         // Return a new gateway response entity with the action specified
         return $this->newResponseDataEntity( $response,
                                              $gateway_data->getGatewayName(),
                                              $action,
                                              [ 'amount' => $request_data->getAmount() ] );
      }


      /**
       * Captures a previously authorized payment using the gateway
       *
       * @param OmnipayGatewayDataAbstract $gateway_data The OmnipayGatewayDataAbstract entity to send the request through
       * @param OmnipayRequestDataAbstract $request_data The OmnipayRequestDataAbstract to send
       *
       * @return OmnipayResponseDataAbstract
       * @throws \Exception
       */
      public function sendCaptureRequestData ( $gateway_data,
                                               $request_data ): object
      {

         // Make sure the gateway supports capture method
         if ( ! $gateway_data->getAPI()
                             ->supportsCapture() ) {
            // Action not supported
            throw new \Exception( "Gateway does not support capture method" );
         }

         // Create the request
         /* @var $api_request AbstractRequest */
         $api_request = $gateway_data->getAPI()
                                     ->capture( $request_data->getMainParameters() );

         // Send the request to the api
         /* @var $response AbstractResponse */
         $response = $api_request->send();

         // Determine the correct action
         $action = ( $response->isRedirect() ? 'redirect' : $request_data->getAction() );

         // Return a new gateway response entity with the action specified
         return $this->newResponseDataEntity( $response,
                                              $gateway_data->getGatewayName(),
                                              $action,
                                              [ 'amount' => $request_data->getAmount() ] );
      }


      /**
       * Sends a purchase request to the gateway (authorizes and captures)
       *
       * @param OmnipayGatewayDataAbstract $gateway_data The OmnipayGatewayDataAbstract entity to send the request through
       * @param OmnipayRequestDataAbstract $request_data The OmnipayRequestDataAbstract to send
       *
       * @return OmnipayResponseDataAbstract
       * @throws \Exception
       */
      public function sendPurchaseRequestData ( $gateway_data,
                                                $request_data ): object
      {

         // Make sure the gateway supports purchase method
         if ( ! $gateway_data->getAPI()
                             ->supportsPurchase() ) {
            // Action not supported
            throw new \Exception( "Gateway does not support purchase method" );
         }

         // Check for offsite URLS
         $this->translateGatewayOffsiteURLs( $request_data,
                                             $request_data->getOffsiteURLs() );

         // Create the request
         /* @var $api_request AbstractRequest */
         $api_request = $gateway_data->getAPI()
                                     ->purchase( $request_data->getMainParameters() );

         // If there are credit card parameters for this request
         if ( ! empty( $request_data->getCreditCardParameters() ) ) {
            // Set the card parameters into a new object
            $api_request->setCard( new CreditCard( $request_data->getCreditCardParameters() ) );
         }

         // Set the item parameters
         $api_request->setItems( $request_data->getItems() );

         // Send the request to the api
         /* @var $response AbstractResponse */
         $response = $api_request->send();

         // Determine the correct action
         $action = ( $response->isRedirect() ? 'redirect' : $request_data->getAction() );

         // Return a new gateway response entity with the action specified
         return $this->newResponseDataEntity( $response,
                                              $gateway_data->getGatewayName(),
                                              $action,
                                              [ 'amount' => $request_data->getAmount() ] );
      }


      /**
       * Confirms receipt of an offsite purchase with the gateway
       * ONLY used on offsite gateways
       *
       * @param OmnipayGatewayDataAbstract $gateway_data The OmnipayGatewayDataAbstract entity to send the request through
       * @param OmnipayRequestDataAbstract $request_data The OmnipayRequestDataAbstract to send
       *
       * @return OmnipayResponseDataAbstract
       * @throws \Exception
       */
      public function sendCompletePurchaseRequestData ( $gateway_data,
                                                        $request_data ): object
      {

         // Make sure the gateway supports complete purchase method
         if ( ! $gateway_data->getAPI()
                             ->supportsCompletePurchase() ) {
            // Action not supported
            throw new \Exception( "Gateway does not support complete purchase method" );
         }

         // Create the request
         /* @var $api_request AbstractRequest */
         $api_request = $gateway_data->getAPI()
                                     ->completePurchase( $request_data->getMainParameters() );

         // Send the request to the api
         /* @var $response AbstractResponse */
         $response = $api_request->send();

         // Determine the correct action
         $action = ( $response->isRedirect() ? 'redirect' : $request_data->getAction() );

         // Return a new gateway response entity with the action specified
         return $this->newResponseDataEntity( $response,
                                              $gateway_data->getGatewayName(),
                                              $action,
                                              [ 'amount' => $request_data->getAmount() ] );
      }


      /**
       * Sets any offsite URLs specified for this processor into the request
       * URLs may reference any values set in the "main parameters" array by using tags: {parameterKey}
       *
       * @param OmnipayRequestDataAbstract $request_data The OmnipayRequestDataAbstract to translate into
       * @param array                      $urls         An array of offsite gateway URLs to translate into the request
       */
      public function translateGatewayOffsiteURLs ( $request_data,
                                                    array $urls ): void
      {

         // Make sure there are URLs
         if ( empty( $urls ) || ! is_array( $urls ) ) {
            // Empty
            return;
         }

         // Loop through each URL
         foreach ( $urls as $key => $url ) {
            // Add the URL into the request's main parameters after replacing any parameter tags
            $request_data->setMainParameter( $key,
                                             $this->replaceTags( $request_data->getMainParameters(),
                                                                 $url ) );
         }
      }


      /**
       * Replaces tags in a string with their values from an associative array
       * Tags are searched for in the format: {tagKey}
       *
       * @param array  $tags   An associative array of tags to replace in the string (key = value format)
       * @param string $string The string that contains the tags to replace
       *
       * @return string
       */
      public function replaceTags ( array $tags,
                                    string $string ): string
      {

         // Find all elements in the string that are in curly brackets: {TagName}
         preg_match_all( '/{(.*?)}/',
                         $string,
                         $matches );

         // If there are matches
         if ( ! empty( $matches[ 1 ] ) ) {
            // Loop through each match and replace it with its value in the tags array
            foreach ( $matches[ 1 ] as $tag ) {
               // Get the value of the matching tag
               $value = ! empty( $tags[ $tag ] ) ? $tags[ $tag ] : null;

               // Replace it
               $string = str_replace( '{' . $tag . '}',
                                      $value,
                                      $string );
            }
         }

         // Return the modified string
         return $string;
      }

   }