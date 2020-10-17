<?php

   namespace Grayl\Omnipay\Common\Helper;

   use Grayl\Omnipay\Common\Controller\OmnipayResponseControllerAbstract;
   use Grayl\Omnipay\Common\Entity\OmnipayGatewayCreditCard;
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
       * Translates an OmnipayGatewayCreditCard entity an array of parameters for Omnipay
       *
       * @param OmnipayRequestDataAbstract $request_data A OmnipayRequestDataAbstract entity to translate into
       * @param OmnipayGatewayCreditCard   $credit_card  A OmnipayGatewayCreditCard entity to translate from
       */
      public function translateOmnipayGatewayCreditCard ( OmnipayRequestDataAbstract $request_data,
                                                          OmnipayGatewayCreditCard $credit_card ): void
      {

         // Set the OmnipayGatewayCreditCard fields into the request's credit card parameters
         $request_data->setCreditCardParameter( 'number',
                                                $credit_card->getNumber() );
         $request_data->setCreditCardParameter( 'expiryMonth',
                                                $credit_card->getExpiryMonth() );
         $request_data->setCreditCardParameter( 'expiryYear',
                                                $credit_card->getExpiryYear() );
         $request_data->setCreditCardParameter( 'cvv',
                                                $credit_card->getCVV() );
      }


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
         $request_data->setMainParameter( 'transactionReference',
                                          $reference_id );
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