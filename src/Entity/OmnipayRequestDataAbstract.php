<?php

   namespace Grayl\Omnipay\Common\Entity;

   use Grayl\Gateway\Common\Entity\RequestDataAbstract;
   use Grayl\Mixin\Common\Entity\FlatDataBag;
   use Grayl\Mixin\Common\Entity\KeyedDataBag;
   use Grayl\Omnipay\Common\Traits\OmnipayMainParametersTrait;

   /**
    * Abstract class OmnipayRequestDataAbstract
    * The abstract entity for all requests to an Omnipay gateway
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayRequestDataAbstract extends RequestDataAbstract implements OmnipayRequestDataInterface
   {

      // Traits
      use OmnipayMainParametersTrait;

      /**
       * An array of offsite URLs for this Gateway if it uses external redirects (i.e. Paypal)
       *
       * @var KeyedDataBag
       */
      protected KeyedDataBag $offsite_urls;

      /**
       * Global Omnipay main parameters ( key = value format )
       *
       * @var KeyedDataBag
       */
      protected KeyedDataBag $main_parameters;

      /**
       * Global Omnipay credit card parameters ( key = value format )
       *
       * @var KeyedDataBag
       */
      protected KeyedDataBag $credit_card_parameters;

      /**
       * An array of Omnipay items
       *
       * @var FlatDataBag
       */
      protected FlatDataBag $items;


      /**
       * Class constructor
       *
       * @param string $action       The action being taken in this request (authorize, capture)
       * @param array  $offsite_urls An array of offsite URLs for this Gateway if it uses external redirects
       */
      public function __construct ( string $action,
                                    array $offsite_urls )
      {

         // Call the parent constructor
         parent::__construct( $action );

         // Create the bags
         $this->offsite_urls           = new KeyedDataBag();
         $this->main_parameters        = new KeyedDataBag();
         $this->credit_card_parameters = new KeyedDataBag();
         $this->items                  = new FlatDataBag();

         // Set the class data
         $this->setOffsiteURLs( $offsite_urls );
      }


      /**
       * Sets a single offsite URL
       *
       * @param string $key   The key name for the offsite URL
       * @param mixed  $value The value of the offsite URL
       */
      public function setOffsiteURL ( string $key,
                                      ?string $value ): void
      {

         // Set the offsite URL
         $this->offsite_urls->setVariable( $key,
                                           $value );
      }


      /**
       * Retrieves the value of a stored offsite URL
       *
       * @param string $key The key name for the offsite URL
       *
       * @return string
       */
      public function getOffsiteURL ( string $key ): ?string
      {

         // Return the offsite URL value
         return $this->offsite_urls->getVariable( $key );
      }


      /**
       * Sets multiple offsite URLs using a passed array
       *
       * @param array $offsite_urls The associative array of offsite URLs to set ( key => value )
       */
      public function setOffsiteURLs ( array $offsite_urls ): void
      {

         // Set the offsite URLs
         $this->offsite_urls->setVariables( $offsite_urls );
      }


      /**
       * Retrieves the entire array of offsite URLs
       *
       * @return array
       */
      public function getOffsiteURLs (): array
      {

         // Return all offsite URLs
         return $this->offsite_urls->getVariables();
      }


      /**
       * Sets a single main parameter
       *
       * @param string $key   The key of the main parameter
       * @param mixed  $value The value of the main parameter
       */
      public function setMainParameter ( string $key,
                                         ?string $value ): void
      {

         // Set the main parameter
         $this->main_parameters->setVariable( $key,
                                              $value );
      }


      /**
       * Retrieves the value of a main parameter
       *
       * @param string $key The key of the main parameter
       *
       * @return mixed
       */
      public function getMainParameter ( string $key )
      {

         // Return the value
         return $this->main_parameters->getVariable( $key );
      }


      /**
       * Sets multiple main parameters
       *
       * @param array $parameters The associative array of parameters to set ( key => value )
       */
      public function setMainParameters ( array $parameters ): void
      {

         // Set all parameters
         $this->main_parameters->setVariables( $parameters );
      }


      /**
       * Gets the entire array of main parameters
       *
       * @return array
       */
      public function getMainParameters (): array
      {

         // Return the array of main parameters
         return $this->main_parameters->getVariables();
      }


      /**
       * Sets a single credit card parameter
       *
       * @param string $key   The key name for the credit card parameter
       * @param mixed  $value The value of the credit card parameter
       */
      public function setCreditCardParameter ( string $key,
                                               ?string $value ): void
      {

         // Set the credit card parameter
         $this->credit_card_parameters->setVariable( $key,
                                                     $value );
      }


      /**
       * Retrieves the value of a stored credit card parameter
       *
       * @param string $key The key name for the credit card parameter
       *
       * @return mixed
       */
      public function getCreditCardParameter ( string $key )
      {

         // Return the value
         return $this->credit_card_parameters->getVariable( $key );
      }


      /**
       * Retrieves the entire array of credit card parameters
       *
       * @return array
       */
      public function getCreditCardParameters (): array
      {

         // Return all credit card parameters
         return $this->credit_card_parameters->getVariables();
      }


      /**
       * Gets the array of items
       *
       * @return array
       */
      public function getItems (): array
      {

         // Return the array of items
         return $this->items->getPieces();
      }


      /**
       * Puts a new item into the bag of items
       *
       * @param string $name     The item display name
       * @param int    $quantity The item quantity
       * @param float  $price    The price of the item
       */
      public function putItem ( string $name,
                                int $quantity,
                                float $price ): void
      {

         // Store the item
         $this->items->putPiece( [ 'name'     => $name,
                                   'quantity' => $quantity,
                                   'price'    => $price, ] );
      }

   }