<?php

   namespace Grayl\Omnipay\Common\Helper;

   use Grayl\Omnipay\Common\Controller\OmnipayResponseControllerAbstract;
   use Grayl\Omnipay\Common\Entity\OmnipayGatewayOffsiteCustomer;
   use Grayl\Omnipay\Common\Entity\OmnipayRequestDataAbstract;

   /**
    * A package of functions for working with various Omnipay objects
    * These are kept isolated to maintain separation between the main library and specific user functionality
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayHelperAbstract
   {

      /**
       * Translates a previously created Omnipay reference ID into a new OmnipayRequestDataAbstract
       *
       * @param OmnipayRequestDataAbstract $request_data A OmnipayRequestDataAbstract entity to translate into
       * @param string                     $reference_id The Omnipay reference ID from a previous gateway request (such as an authorization)
       */
      public function translateOmnipayReferenceID ( OmnipayRequestDataAbstract $request_data,
                                                    string $reference_id ): void
      {

         // Set the transaction reference id from the previous response
         $request_data->setTransactionReference( $reference_id );
      }


      /**
       * Creates an OmnipayGatewayOffsiteCustomer from offsite payment data returned in an OmnipayResponseControllerAbstract
       *
       * @param OmnipayResponseControllerAbstract $response The response object to use
       *
       * @return OmnipayGatewayOffsiteCustomer
       * @noinspection PhpInconsistentReturnPointsInspection
       */
      public function newOmnipayGatewayOffsiteCustomerFromResponse ( OmnipayResponseControllerAbstract $response ): OmnipayGatewayOffsiteCustomer
      {
         // Not implemented by all gateways
      }

   }