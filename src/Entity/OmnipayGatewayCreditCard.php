<?php

   namespace Grayl\Omnipay\Common\Entity;

   /**
    * Class OmnipayGatewayCreditCard
    * The entity for an Omnipay gateway's credit card
    *
    * @package Grayl\Omnipay\Common
    */
   class OmnipayGatewayCreditCard
   {

      /**
       * The full credit card number
       *
       * @var string
       */
      private string $number;

      /**
       * The expiration month
       *
       * @var int
       */
      private int $expiry_month;

      /**
       * The expiration year
       *
       * @var int
       */
      private int $expiry_year;

      /**
       * The CVV
       *
       * @var string
       */
      private string $cvv;


      /**
       * The class constructor
       *
       * @param string $number The credit card number
       * @param int    $month  The credit card expiry month (2 digit)
       * @param int    $year   The credit card expiry year (4 digit)
       * @param string $cvv    The credit card CVV
       */
      public function __construct ( string $number,
                                    int $month,
                                    int $year,
                                    string $cvv )
      {

         // Set the class data
         $this->setNumber( $number );
         $this->setExpiryMonth( $month );
         $this->setExpiryYear( $year );
         $this->setCVV( $cvv );
      }


      /**
       * Sets the credit card number
       *
       * @param string $number The credit card number
       */
      public function setNumber ( string $number ): void
      {

         // Set the number
         $this->number = $number;
      }


      /**
       * Gets the credit card number
       *
       * @return string
       */
      public function getNumber (): string
      {

         // Get the number
         return $this->number;
      }


      /**
       * Sets the credit card expiry month
       *
       * @param int $month The credit card expiry month (2 digit)
       */
      public function setExpiryMonth ( int $month ): void
      {

         // Set the expiry month
         $this->expiry_month = $month;
      }


      /**
       * Gets the credit card expiry month
       *
       * @return int
       */
      public function getExpiryMonth (): int
      {

         // Get the expiry month
         return $this->expiry_month;
      }


      /**
       * Sets the credit card expiry year
       *
       * @param int $year The credit card expiry year (4 digit)
       */
      public function setExpiryYear ( int $year ): void
      {

         // Set the expiry year
         $this->expiry_year = $year;
      }


      /**
       * Gets the credit card expiry year
       *
       * @return int
       */
      public function getExpiryYear (): int
      {

         // Get the expiry year
         return $this->expiry_year;
      }


      /**
       * Sets the credit card cvv
       *
       * @param string $cvv The credit card CVV
       */
      public function setCVV ( string $cvv ): void
      {

         // Set the cvv
         $this->cvv = $cvv;
      }


      /**
       * Gets the credit card cvv
       *
       * @return string
       */
      public function getCVV (): string
      {

         // Get the cvv
         return $this->cvv;
      }

   }