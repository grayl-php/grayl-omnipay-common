<?php

   namespace Grayl\Omnipay\Common;

   use Grayl\Gateway\Common\GatewayPorterInterface;
   use Grayl\Omnipay\Common\Controller\OmnipayResponseControllerAbstract;
   use Grayl\Omnipay\Common\Entity\OmnipayGatewayCreditCard;
   use Grayl\Omnipay\Common\Entity\OmnipayGatewayOffsiteCustomer;

   /**
    * Interface OmnipayInjectorInterface
    * This interface describes the porter for all Omnipay based gateways
    *
    * @package Grayl\Omnipay\Common
    */
   interface OmnipayPorterInterface extends GatewayPorterInterface
   {

      /**
       * Grabs any offsite URLs for the environment
       *
       * @return array
       */
      public function getOffsiteURLs (): array;


      /**
       * Creates a new OmnipayGatewayCreditCard entity
       *
       * @param string $number The credit card number
       * @param int    $month  The credit card expiry month (2 digit)
       * @param int    $year   The credit card expiry year (4 digit)
       * @param string $cvv    The credit card CVV
       *
       * @return OmnipayGatewayCreditCard
       */
      public function newOmnipayGatewayCreditCard ( string $number,
                                                    int $month,
                                                    int $year,
                                                    string $cvv ): OmnipayGatewayCreditCard;


      /**
       * Creates an OmnipayGatewayOffsiteCustomer from offsite payment data returned in an OmnipayResponseControllerAbstract
       *
       * @param OmnipayResponseControllerAbstract $response The response object to use
       *
       * @return OmnipayGatewayOffsiteCustomer
       */
      public function newOmnipayGatewayOffsiteCustomerFromResponse ( OmnipayResponseControllerAbstract $response ): OmnipayGatewayOffsiteCustomer;

   }