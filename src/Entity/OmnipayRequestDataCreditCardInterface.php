<?php

   namespace Grayl\Omnipay\Common\Entity;

   /**
    * Interface OmnipayRequestDataInterface
    * This interface describes all Omnipay gateway requests
    *
    * @package Grayl\Omnipay\Common
    */
   interface OmnipayRequestDataCreditCardInterface extends OmnipayRequestDataInterface
   {

      /**
       * Sets a single credit card parameter
       *
       * @param string $key   The key name for the credit card parameter
       * @param mixed  $value The value of the credit card parameter
       */
      public function setCreditCardParameter ( string $key,
                                               ?string $value ): void;


      /**
       * Retrieves the value of a stored credit card parameter
       *
       * @param string $key The key name for the credit card parameter
       *
       * @return mixed
       */
      public function getCreditCardParameter ( string $key );


      /**
       * Retrieves the entire array of credit card parameters
       *
       * @return array
       */
      public function getCreditCardParameters (): array;
   }