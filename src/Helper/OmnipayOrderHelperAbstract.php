<?php

   namespace Grayl\Omnipay\Common\Helper;

   use Grayl\Omnipay\Common\Controller\OmnipayResponseControllerAbstract;
   use Grayl\Omnipay\Common\Entity\OmnipayGatewayOffsiteCustomer;
   use Grayl\Omnipay\Common\Entity\OmnipayRequestDataAbstract;
   use Grayl\Store\Order\Controller\OrderController;
   use Grayl\Store\Order\Entity\OrderCustomer;
   use Grayl\Store\Order\Entity\OrderData;
   use Grayl\Store\Order\Entity\OrderItemBag;
   use Grayl\Store\Order\OrderPorter;

   /**
    * A package of functions for working with Omnipay and orders
    * These are kept isolated to maintain separation between the main library and specific user functionality
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayOrderHelperAbstract
   {

      /**
       * Translates an OrderController into an OmnipayRequestDataAbstract entity
       *
       * @param OmnipayRequestDataAbstract $request_data     A OmnipayRequestDataAbstract entity to translate into
       * @param OrderController            $order_controller An OrderController entity to translate from
       */
      public function translateOrderController ( OmnipayRequestDataAbstract $request_data,
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
       * Translates an OrderData entity into an OmnipayRequestDataAbstract entity
       *
       * @param OmnipayRequestDataAbstract $request_data A OmnipayRequestDataAbstract entity to translate into
       * @param OrderData                  $order_data   An OrderData entity to translate from
       */
      protected function translateOrderData ( OmnipayRequestDataAbstract $request_data,
                                              OrderData $order_data ): void
      {

         // Set the OrderData fields into the request's main parameters
         $request_data->setAmount( $order_data->getAmount() );
         $request_data->setCurrency( $order_data->getCurrency() );
         $request_data->setDescription( $order_data->getDescription() );
         $request_data->setTransactionID( $order_data->getOrderID() );
         $request_data->setInvoiceNumber( $order_data->getOrderID() );
         $request_data->setClientIP( $order_data->getIPAddress() );
      }


      /**
       * Translates an OrderCustomer into an OmnipayRequestDataAbstract entity
       *
       * @param OmnipayRequestDataAbstract $request_data   A OmnipayRequestDataAbstract entity to translate into
       * @param OrderCustomer              $order_customer An OrderCustomer entity to translate from
       */
      protected function translateOrderCustomer ( OmnipayRequestDataAbstract $request_data,
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


      /**
       * Translates OrderItemBag into an OmnipayRequestDataAbstract entity
       *
       * @param OmnipayRequestDataAbstract $request_data   A OmnipayRequestDataAbstract entity to translate into
       * @param OrderItemBag               $order_item_bag An OrderItemBag entity to translate from
       */
      protected function translateOrderItemBag ( OmnipayRequestDataAbstract $request_data,
                                                 OrderItemBag $order_item_bag ): void
      {

         // Loop through each item inside the bag
         foreach ( $order_item_bag->getOrderItems() as $item ) {
            // Add the item as a new array
            $request_data->putItem( $item->getName(),
                                    $item->getQuantity(),
                                    $item->getPrice() );
         }
      }


      /**
       * Saves an OmnipayGatewayOffsiteCustomer to an OrderController
       *
       * @param OrderController               $order_controller An OrderController to translate into
       * @param OmnipayGatewayOffsiteCustomer $offsite_customer An OmnipayGatewayOffsiteCustomer entity to translate from
       *
       * @throws \Exception
       */
      public function saveOffsiteCustomerToOrderController ( OrderController $order_controller,
                                                             OmnipayGatewayOffsiteCustomer $offsite_customer ): void
      {

         // Create a new OrderCustomer from the OmnipayGatewayOffsiteCustomer object
         $order_customer = $this->newOrderCustomerFromOmnipayGatewayOffsiteCustomer( $order_controller->getOrderID(),
                                                                                     $offsite_customer );
         // Set the newly created OrderCustomer to the original order
         $order_controller->setOrderCustomer( $order_customer );

         // Save the order
         $order_controller->saveOrder();
      }


      /**
       * Translates the data from an OmnipayGatewayOffsiteCustomer into a new OrderCustomer
       *
       * @param string                        $order_id         The order ID associated with this order customer
       * @param OmnipayGatewayOffsiteCustomer $offsite_customer A configured OmnipayGatewayOffsiteCustomer entity to translate from
       *
       * @return OrderCustomer
       */
      private function newOrderCustomerFromOmnipayGatewayOffsiteCustomer ( string $order_id,
                                                                           OmnipayGatewayOffsiteCustomer $offsite_customer ): OrderCustomer
      {

         // Return a new OrderCustomer
         return new OrderCustomer( $order_id,
                                   $offsite_customer->getFirstName(),
                                   $offsite_customer->getLastName(),
                                   $offsite_customer->getEmailAddress(),
                                   $offsite_customer->getAddress1(),
                                   $offsite_customer->getAddress2(),
                                   $offsite_customer->getCity(),
                                   $offsite_customer->getState(),
                                   $offsite_customer->getPostcode(),
                                   $offsite_customer->getCountry(),
                                   $offsite_customer->getPhoneNumber() );
      }


      /**
       * Creates a new OrderPayment entity from an Omnipay gateway's response
       *
       * @param OmnipayResponseControllerAbstract $response_controller The ResponseController entity to use
       * @param OrderController                   $order_controller    An OrderController to translate into
       * @param ?string                           $metadata            Extra data associated to this PaymentLog
       *
       * @throws \Exception
       */
      public function newOrderPaymentFromOmnipayResponseController ( OmnipayResponseControllerAbstract $response_controller,
                                                                     OrderController $order_controller,
                                                                     ?string $metadata ): void
      {

         // Create a new order payment from the response
         $new_payment = OrderPorter::getInstance()
                                   ->newOrderPayment( $order_controller->getOrderID(),
                                                      $response_controller->getReferenceID(),
                                                      $response_controller->getGatewayName(),
                                                      $response_controller->getAmount(),
                                                      $response_controller->getAction(),
                                                      $response_controller->isSuccessful(),
                                                      $metadata );

         // Set the newly created payment into the order
         $order_controller->setOrderPayment( $new_payment );

         // Save the order
         $order_controller->saveOrder();
      }

   }