<?php

   namespace Grayl\Omnipay\Common\Entity;

   use Grayl\Gateway\Common\Entity\RequestDataInterface;

   /**
    * Interface OmnipayRequestDataInterface
    * This interface describes all Omnipay gateway requests
    *
    * @package Grayl\Omnipay\Common
    */
   interface OmnipayRequestDataInterface extends RequestDataInterface
   {
      /**
       * Sets a single offsite URL
       *
       * @param string $key   The key name for the offsite URL
       * @param mixed  $value The value of the offsite URL
       */
      public function setOffsiteURL ( string $key,
                                      ?string $value ): void;


      /**
       * Retrieves the value of a stored offsite URL
       *
       * @param string $key The key name for the offsite URL
       *
       * @return string
       */
      public function getOffsiteURL ( string $key );


      /**
       * Sets multiple offsite URLs using a passed array
       *
       * @param array $offsite_urls The associative array of offsite URLs to set ( key => value )
       */
      public function setOffsiteURLs ( array $offsite_urls ): void;


      /**
       * Retrieves the entire array of offsite URLs
       *
       * @return array
       */
      public function getOffsiteURLs (): array;


      /**
       * Sets a single main parameter
       *
       * @param string $key   The key of the main parameter
       * @param mixed  $value The value of the main parameter
       */
      public function setMainParameter ( string $key,
                                         ?string $value ): void;


      /**
       * Retrieves the value of a main parameter
       *
       * @param string $key The key of the main parameter
       *
       * @return mixed
       */
      public function getMainParameter ( string $key );


      /**
       * Sets multiple main parameters
       *
       * @param array $parameters The associative array of parameters to set ( key => value )
       */
      public function setMainParameters ( array $parameters ): void;


      /**
       * Gets the entire array of main parameters
       *
       * @return array
       */
      public function getMainParameters (): array;


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


      /**
       * Gets the array of items
       *
       * @return array
       */
      public function getItems (): array;


      /**
       * Puts a new item into the bag of items
       *
       * @param array $item The array to store
       */
      public function putItem ( array $item ): void;

   }