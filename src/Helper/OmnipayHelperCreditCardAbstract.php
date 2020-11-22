<?php

   namespace Grayl\Omnipay\Common\Helper;

   use Grayl\Omnipay\Common\Entity\OmnipayGatewayCreditCard;
   use Grayl\Omnipay\Common\Entity\OmnipayRequestDataCreditCardAbstract;

   /**
    * A package of functions for working with various Omnipay objects with credit card data
    * These are kept isolated to maintain separation between the main library and specific user functionality
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayHelperCreditCardAbstract extends OmnipayHelperAbstract
   {

      /**
       * Translates an OmnipayGatewayCreditCard entity an array of parameters for Omnipay
       *
       * @param OmnipayRequestDataCreditCardAbstract $request_data A OmnipayRequestDataCreditCardAbstract entity to translate into
       * @param OmnipayGatewayCreditCard             $credit_card  A OmnipayGatewayCreditCard entity to translate from
       */
      public function translateOmnipayGatewayCreditCard ( OmnipayRequestDataCreditCardAbstract $request_data,
                                                          OmnipayGatewayCreditCard $credit_card ): void
      {

         // Set the OmnipayGatewayCreditCard fields into the request's credit card parameters
         $request_data->setCreditCardNumber( $credit_card->getNumber() );
         $request_data->setCreditCardExpiryMonth( $credit_card->getExpiryMonth() );
         $request_data->setCreditCardExpiryYear( $credit_card->getExpiryYear() );
         $request_data->setCreditCardCVV( $credit_card->getCVV() );
      }

   }