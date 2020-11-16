<?php

   namespace Grayl\Omnipay\Common\Entity;

   use Grayl\Mixin\Common\Entity\KeyedDataBag;
   use Grayl\Omnipay\Common\Traits\OmnipayCreditCardParametersTrait;

   /**
    * Abstract class OmnipayRequestDataCreditCardAbstract
    * The abstract entity for all requests with credit card data to an Omnipay gateway
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayRequestDataCreditCardAbstract extends OmnipayRequestDataAbstract implements OmnipayRequestDataCreditCardInterface
   {

      // Traits
      use OmnipayCreditCardParametersTrait;

      /**
       * Global Omnipay credit card parameters ( key = value format )
       *
       * @var KeyedDataBag
       */
      protected KeyedDataBag $credit_card_parameters;


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
         parent::__construct( $action,
                              $offsite_urls );

         // Create the bags
         $this->credit_card_parameters = new KeyedDataBag();

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
   }