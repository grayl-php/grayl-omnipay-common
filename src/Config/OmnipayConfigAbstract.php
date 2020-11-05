<?php

   namespace Grayl\Omnipay\Common\Config;

   use Grayl\Gateway\Common\Config\GatewayConfigAbstract;
   use Grayl\Mixin\Common\Entity\KeyedDataBag;

   /**
    * Class OmnipayConfigAbstract
    * The abstract class of the configs for all Omnipay API gateways
    * @method OmnipayAPIEndpointAbstract getLiveAPIEndpoint( string $api_endpoint_id )
    * @method void setLiveAPIEndpoint( OmnipayAPIEndpointAbstract $api_endpoint )
    * @method OmnipayAPIEndpointAbstract getSandboxAPIEndpoint( string $api_endpoint_id )
    * @method void setSandboxAPIEndpoint( OmnipayAPIEndpointAbstract $api_endpoint )
    *
    * @package Grayl\Gateway\Common
    */
   abstract class OmnipayConfigAbstract extends GatewayConfigAbstract
   {

      /**
       * A bag of offsite URLs for the gateway if needed
       *
       * @var KeyedDataBag
       */
      protected KeyedDataBag $offsite_urls;


      /**
       * Class constructor
       *
       * @param string $gateway_name The name of the gateway
       */
      public function __construct ( string $gateway_name )
      {

         // Call the parent constructor
         parent::__construct( $gateway_name );

         // Create the required bags
         $this->offsite_urls = new KeyedDataBag();
      }


      /**
       * Retrieves a stored offsite URL
       *
       * @param string $id The ID of the offsite URL
       *
       * @return ?string
       */
      public function getOffsiteURL ( string $id ): ?string
      {

         // Return the offsite URL
         return $this->offsite_urls->getVariable( $id );
      }


      /**
       * Retrieves all stored offsite URLs
       *
       * @return ?String[]
       */
      public function getOffsiteURLs (): ?array
      {

         // Return all offsite URLs
         return $this->offsite_urls->getVariables();
      }


      /**
       * Sets an offsite URL into the data bag
       *
       * @param string $id          The ID of the offsite URL
       * @param string $offsite_url The actual URL
       */
      public function setOffsiteURL ( string $id,
                                      string $offsite_url ): void
      {

         // Set the offsite URL
         $this->offsite_urls->setVariable( $id,
                                           $offsite_url );
      }

   }