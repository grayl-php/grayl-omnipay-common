<?php

   namespace Grayl\Omnipay\Common\Entity;

   use Grayl\Gateway\Common\Entity\ResponseDataInterface;

   /**
    * Interface OmnipayResponseDataInterface
    * This interface describes all Omnipay gateway responses
    *
    * @package Grayl\Omnipay\Common
    */
   interface OmnipayResponseDataInterface extends ResponseDataInterface
   {
      /**
       * Sets the total payment amount processed by the gateway
       *
       * @param float $amount The payment amount processed by the gateway
       */
      public function setAmount ( float $amount ): void;


      /**
       * Returns the total payment amount processed by the gateway
       *
       * @return float
       */
      public function getAmount (): float;

   }