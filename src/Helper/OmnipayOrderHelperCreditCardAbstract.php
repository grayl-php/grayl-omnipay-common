<?php

   namespace Grayl\Omnipay\Common\Helper;

   use Grayl\Omnipay\Common\Entity\OmnipayRequestDataCreditCardAbstract;
   use Grayl\Store\Order\Controller\OrderController;
   use Grayl\Store\Order\Entity\OrderCustomer;

   /**
    * A package of functions for working with Omnipay and orders
    * These are kept isolated to maintain separation between the main library and specific user functionality
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayOrderHelperCreditCardAbstract extends OmnipayOrderHelperAbstract
   {

      /**
       * Translates an OrderController into an OmnipayRequestDataAbstract entity
       *
       * @param OmnipayRequestDataCreditCardAbstract $request_data     A OmnipayRequestDataCreditCardAbstract entity to translate into
       * @param OrderController                      $order_controller An OrderController entity to translate from
       */
      public function translateOrderController ( $request_data,
                                                 OrderController $order_controller ): void
      {

         // Translate all order components
         $this->translateOrderData( $request_data,
                                    $order_controller->getOrderData() );
         $this->translateOrderItemBag( $request_data,
                                       $order_controller->getOrderItemBag() );

         // If there is an OrderCustomer
         if ( ! empty ( $order_controller->getOrderCustomer() ) ) {
            // Translate the OrderCustomer into the request
            $this->translateOrderCustomer( $request_data,
                                           $order_controller->getOrderCustomer() );
         }
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