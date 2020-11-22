<?php

   namespace Grayl\Omnipay\Common\Traits;

   use Grayl\Mixin\Common\Entity\KeyedDataBag;

   /**
    * Trait OmnipayMainParametersTrait.
    * The trait for manipulating Omnipay main parameters in a OmnipayRequestDataAbstract entity.
    *
    * @property KeyedDataBag $main_parameters Global Omnipay main parameters ( key = value format )
    * @package Grayl\Omnipay\Common
    */
   trait OmnipayMainParametersTrait
   {

      /**
       * Sets the transaction id
       *
       * @param string $id The internal transaction ID
       */
      public function setTransactionID ( string $id ): void
      {

         // Set the transaction ID
         $this->main_parameters->setVariable( 'transactionId',
                                              $id );

      }


      /**
       * Gets the transaction id
       *
       * @return string
       */
      public function getTransactionID (): string
      {

         // Get the transaction ID
         return $this->main_parameters->getVariable( 'transactionId' );

      }


      /**
       * Sets the transaction reference id (external 3rd party transaction ID)
       *
       * @param string $id The external transaction reference ID
       */
      public function setTransactionReference ( string $id ): void
      {

         // Set the transaction reference ID
         $this->main_parameters->setVariable( 'transactionReference',
                                              $id );

      }


      /**
       * Gets the transaction reference id (external 3rd party transaction ID)
       *
       * @return ?string
       */
      public function getTransactionReference (): ?string
      {

         // Get the transaction reference ID
         return $this->main_parameters->getVariable( 'transactionReference' );

      }


      /**
       * Sets the invoice number
       *
       * @param string $invoice_number The invoice number
       */
      public function setInvoiceNumber ( string $invoice_number ): void
      {

         // Set the invoice number
         $this->main_parameters->setVariable( 'invoiceNumber',
                                              $invoice_number );

      }


      /**
       * Gets the invoice number
       *
       * @return ?string
       */
      public function getInvoiceNumber (): ?string
      {

         // Get the invoice number
         return $this->main_parameters->getVariable( 'invoiceNumber' );

      }


      /**
       * Sets the amount
       *
       * @param float $amount The amount to charge
       */
      public function setAmount ( float $amount ): void
      {

         // Set the amount
         $this->main_parameters->setVariable( 'amount',
                                              $amount );

      }


      /**
       * Gets the amount
       *
       * @return float
       */
      public function getAmount (): float
      {

         // Get the amount
         return $this->main_parameters->getVariable( 'amount' );

      }


      /**
       * Sets the description
       *
       * @param string $description The description
       */
      public function setDescription ( string $description ): void
      {

         // Set the description
         $this->main_parameters->setVariable( 'description',
                                              $description );

      }


      /**
       * Gets the description
       *
       * @return ?string
       */
      public function getDescription (): ?string
      {

         // Get the description
         return $this->main_parameters->getVariable( 'description' );

      }


      /**
       * Sets the currency
       *
       * @param string $currency The base currency of the amount
       */
      public function setCurrency ( string $currency ): void
      {

         // Set the currency
         $this->main_parameters->setVariable( 'currency',
                                              $currency );

      }


      /**
       * Gets the currency
       *
       * @return string
       */
      public function getCurrency (): string
      {

         // Get the currency
         return $this->main_parameters->getVariable( 'currency' );

      }


      /**
       * Sets the client IP
       *
       * @param string $ip The IP of the client
       */
      public function setClientIP ( string $ip ): void
      {

         // Set the client IP
         $this->main_parameters->setVariable( 'clientIp',
                                              $ip );

      }


      /**
       * Gets the client IP
       *
       * @return string
       */
      public function getClientIP (): string
      {

         // Get the client IP
         return $this->main_parameters->getVariable( 'clientIp' );

      }

   }