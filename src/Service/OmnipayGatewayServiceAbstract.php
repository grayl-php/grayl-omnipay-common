<?php

   namespace Grayl\Omnipay\Common\Service;

   use Grayl\Gateway\Common\Service\GatewayServiceAbstract;
   use Grayl\Omnipay\Common\Config\OmnipayAPIEndpointAbstract;
   use Grayl\Omnipay\Common\Config\OmnipayConfigAbstract;
   use Omnipay\Common\AbstractGateway;

   /**
    * Abstract class OmnipayGatewayServiceAbstract
    * The abstract class for all Omnipay payment gateway services
    * @method OmnipayAPIEndpointAbstract getAPIEndpoint ( OmnipayConfigAbstract $config, string $environment, string $api_endpoint_id )
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayGatewayServiceAbstract extends GatewayServiceAbstract implements OmnipayGatewayServiceInterface
   {

      /**
       * Configures an API to use the sandbox environment
       *
       * @param AbstractGateway $api The Omnipay API object to configure
       */
      public function configureSandboxAPI ( $api ): void
      {

         // Enable test mode in Omnipay
         $api->setTestMode( true );
      }


      /**
       * Configures an API to use the live environment
       *
       * @param AbstractGateway $api The Omnipay Omnipay API object to configure
       */
      public function configureLiveAPI ( $api ): void
      {

         // Disable test mode in Omnipay
         $api->setTestMode( false );
      }

   }