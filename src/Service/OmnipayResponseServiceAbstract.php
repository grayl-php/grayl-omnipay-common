<?php

   namespace Grayl\Omnipay\Common\Service;

   use Grayl\Omnipay\Common\Entity\OmnipayResponseDataAbstract;

   /**
    * Abstract class OmnipayResponseServiceAbstract
    * The abstract class for all Omnipay payment gateway response services
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayResponseServiceAbstract implements OmnipayResponseServiceInterface
   {

      /**
       * Returns a true / false value based on a gateway API response
       *
       * @param OmnipayResponseDataAbstract $response_data The response object to check
       *
       * @return bool
       */
      public function isSuccessful ( $response_data ): bool
      {

         // Return the success status from Omnipay
         return $response_data->getApiResponse()
                              ->isSuccessful();
      }


      /**
       * Returns the reference ID from a gateway API response
       *
       * @param OmnipayResponseDataAbstract $response_data The response object to pull the reference ID from
       *
       * @return string
       */
      public function getReferenceID ( $response_data ): ?string
      {

         // Return the reference ID from Omnipay
         return $response_data->getApiResponse()
                              ->getTransactionReference();
      }


      /**
       * Returns the status message from a gateway API response
       *
       * @param OmnipayResponseDataAbstract $response_data The response object to get the message from
       *
       * @return string
       */
      public function getMessage ( $response_data ): ?string
      {

         // Return the message from Omnipay
         return $response_data->getApiResponse()
                              ->getMessage();
      }


      /**
       * Returns the raw data from a gateway API response
       *
       * @param OmnipayResponseDataAbstract $response_data The response object to pull the data from
       *
       * @return mixed
       */
      public function getData ( $response_data )
      {

         // Return the raw data from Omnipay
         return $response_data->getApiResponse()
                              ->getData();
      }


      /**
       * Returns a true / false value if a payment is still pending from a gateway API response
       *
       * @param OmnipayResponseDataAbstract $response_data The response object to check
       *
       * @return bool
       */
      public function isPending ( $response_data ): bool
      {

         // Use the pending status from Omnipay
         return $response_data->getApiResponse()
                              ->isPending();
      }


      /**
       * Returns the AVS result code from a gateway API response
       *
       * @param OmnipayResponseDataAbstract $response_data The response object to pull the AVS code from
       *
       * @return string
       */
      public function getAVSCode ( $response_data ): ?string
      {

         // Not used for all gateways
         return null;
      }


      /**
       * Returns the CVV result code from a gateway API response
       *
       * @param OmnipayResponseDataAbstract $response_data The response object to pull the CVV code from
       *
       * @return string
       */
      public function getCVVCode ( $response_data ): ?string
      {

         // Not used for all gateways
         return null;
      }


      /**
       * Checks if a gateway is requesting an offsite redirect for payment
       *
       * @param OmnipayResponseDataAbstract $response_data The response object to check for redirection
       *
       * @return bool
       */
      public function isRedirect ( $response_data ): bool
      {

         // Return the redirect status from Omnipay
         return $response_data->getApiResponse()
                              ->isRedirect();
      }


      /**
       * Returns the URL for responses that require an offsite redirect for payment
       *
       * @param OmnipayResponseDataAbstract $response_data The response object to get the URL from
       *
       * @return string
       */
      public function getRedirectURL ( $response_data ): ?string
      {

         // Get the API response
         $api_response = $response_data->getApiResponse();

         // Make sure there is a redirect request
         if ( $api_response->isRedirect() ) {
            // Return the redirect status from Omnipay
            return $api_response->getRedirectResponse()
                                ->getTargetUrl();
         }

         // No redirect
         return null;
      }

   }