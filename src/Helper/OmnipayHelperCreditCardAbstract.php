<?php

   namespace Grayl\Omnipay\Common\Helper;

   use Grayl\Omnipay\Common\Entity\OmnipayGatewayCreditCard;
   use Grayl\Omnipay\Common\Entity\OmnipayRequestDataCreditCardAbstract;
   use Grayl\Store\Order\Entity\OrderCustomer;

   /**
    * A package of functions for working with various Omnipay objects
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


      /**
       * Translates an OrderCustomer into an OmnipayRequestDataAbstract entity
       *
       * @param OmnipayRequestDataCreditCardAbstract $request_data   A OmnipayRequestDataCreditCardAbstract entity to translate into
       * @param OrderCustomer                        $order_customer An OrderCustomer entity to translate from
       */
      protected function translateOrderCustomer ( OmnipayRequestDataCreditCardAbstract $request_data,
                                                  OrderCustomer $order_customer ): void
      {

         // Set the OrderCustomer fields into the request's credit card parameters
         // Name and email
         $request_data->setFirstName( $order_customer->getFirstName() );
         $request_data->setLastName( $order_customer->getLastName() );
         $request_data->setEmail( $order_customer->getEmailAddress() );

         // Address
         $request_data->setAddress1( $order_customer->getAddress1() );
         $request_data->setAddress2( $order_customer->getAddress2() );
         $request_data->setCity( $order_customer->getCity() );
         $request_data->setPostcode( $order_customer->getPostcode() );
         $request_data->setState( $order_customer->getState() );
         $request_data->setCountry( $order_customer->getCountry() );
         $request_data->setPhone( $order_customer->getPhoneNumber() );
      }

   }