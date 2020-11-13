<?php

   namespace Grayl\Omnipay\Common\Config;

   use Grayl\Gateway\Common\Config\GatewayAPIEndpointAbstract;

   /**
    * Class OmnipayAPIEndpointAbstract
    * The abstract class of a single Omnipay API endpoint
    *
    * @package Grayl\Gateway\Common
    */
   abstract class OmnipayAPIEndpointAbstract extends GatewayAPIEndpointAbstract
   {

      /**
       * Class constructor
       *
       * @param string $api_endpoint_id The ID of this API endpoint (default, provision, etc.)
       */
      public function __construct ( string $api_endpoint_id )
      {

         // Call the parent constructor
         parent::__construct( $api_endpoint_id );

      }

   }