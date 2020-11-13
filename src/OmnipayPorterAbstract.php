<?php

   namespace Grayl\Omnipay\Common;

   use Grayl\Gateway\Common\GatewayPorterAbstract;
   use Grayl\Omnipay\Common\Config\OmnipayConfigAbstract;
   use Grayl\Omnipay\Common\Entity\OmnipayGatewayCreditCard;
   use Grayl\Omnipay\Common\Entity\OmnipayGatewayDataAbstract;

   /**
    * Abstract class OmnipayPorterAbstract
    * The abstract class for all Omnipay API porters
    * @method OmnipayGatewayDataAbstract getSavedGatewayDataEntity ( string $api_endpoint_id )
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayPorterAbstract extends GatewayPorterAbstract implements OmnipayPorterInterface
   {

      /**
       * The OmnipayConfigAbstract instance for this gateway
       *
       * @var OmnipayConfigAbstract
       */
      protected $config;


      /**
       * Grabs any offsite URLs for the environment
       *
       * @return array
       */
      public function getOffsiteURLs (): array
      {

         // No URLs set for this environment
         return $this->config->getOffsiteURLs();
      }


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
                                                    string $cvv ): OmnipayGatewayCreditCard
      {

         // Return the new entity
         return new OmnipayGatewayCreditCard( $number,
                                              $month,
                                              $year,
                                              $cvv );
      }

   }