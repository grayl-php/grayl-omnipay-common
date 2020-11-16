<?php

   namespace Grayl\Omnipay\Common\Entity;

   use Grayl\Omnipay\Common\Traits\OmnipayCreditCardParametersTrait;

   /**
    * Abstract class OmnipayRequestDataAbstract
    * The abstract entity for all requests to an Omnipay gateway
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayRequestDataCreditCardAbstract extends OmnipayRequestDataAbstract
   {

      // Traits
      use OmnipayCreditCardParametersTrait;
   }