<?php

   namespace Grayl\Omnipay\Common\Entity;

   use Grayl\Gateway\Common\Entity\GatewayDataAbstract;
   use Omnipay\Common\AbstractGateway;

   /**
    * Abstract class OmnipayGatewayDataAbstract
    * The abstract class for all Omnipay payment APIs
    * @method void __construct( AbstractGateway $api, string $gateway_name, string $environment )
    * @method void setAPI( AbstractGateway $api )
    * @method AbstractGateway getAPI()
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayGatewayDataAbstract extends GatewayDataAbstract implements OmnipayGatewayDataInterface
   {

      /**
       * Fully configured Omnipay gateway entity
       *
       * @var AbstractGateway
       */
      protected $api;

   }