<?php

   namespace Grayl\Omnipay\Common\Traits;

   use Grayl\Mixin\Common\Entity\KeyedDataBag;

   /**
    * Trait OmnipayCreditCardParametersTrait.
    * The trait for manipulating Omnipay credit card parameters in a OmnipayRequestDataAbstract entity.
    *
    * @property KeyedDataBag $credit_card_parameters Global Omnipay credit card parameters ( key = value format )
    * @package Grayl\Omnipay\Common
    */
   trait OmnipayCreditCardParametersTrait
   {

      /**
       * Sets the  first name
       *
       * @param string $name The  first name
       */
      public function setFirstName ( string $name ): void
      {

         // Set the first name
         $this->credit_card_parameters->setVariable( 'firstName',
                                                     $name );

      }


      /**
       * Gets the first name
       *
       * @return ?string
       */
      public function getFirstName (): ?string
      {

         // Get the first name
         return $this->credit_card_parameters->getVariable( 'firstName' );

      }


      /**
       * Sets the last name
       *
       * @param string $name The last name
       */
      public function setLastName ( string $name ): void
      {

         // Set the last name
         $this->credit_card_parameters->setVariable( 'lastName',
                                                     $name );

      }


      /**
       * Gets the last name
       *
       * @return ?string
       */
      public function getLastName (): ?string
      {

         // Get the last name
         return $this->credit_card_parameters->getVariable( 'lastName' );

      }


      /**
       * Sets the email
       *
       * @param string $email_address The email address
       */
      public function setEmail ( string $email_address ): void
      {

         // Set the email
         $this->credit_card_parameters->setVariable( 'email',
                                                     $email_address );

      }


      /**
       * Gets the email
       *
       * @return ?string
       */
      public function getEmail (): ?string
      {

         // Get the email
         return $this->credit_card_parameters->getVariable( 'email' );

      }


      /**
       * Sets the address part 1
       *
       * @param string $address The address part 1
       */
      public function setAddress1 ( string $address ): void
      {

         // Set the address part 1
         $this->credit_card_parameters->setVariable( 'Address1',
                                                     $address );

      }


      /**
       * Gets the address part 1
       *
       * @return ?string
       */
      public function getAddress1 (): ?string
      {

         // Get the address part 1
         return $this->credit_card_parameters->getVariable( 'Address1' );

      }


      /**
       * Sets the address part 2
       *
       * @param ?string $address The address part 2
       */
      public function setAddress2 ( ?string $address ): void
      {

         // Set the address part 2
         $this->credit_card_parameters->setVariable( 'Address2',
                                                     $address );

      }


      /**
       * Gets the address part 2
       *
       * @return ?string
       */
      public function getAddress2 (): ?string
      {

         // Get the address part 2
         return $this->credit_card_parameters->getVariable( 'Address2' );

      }


      /**
       * Sets the city
       *
       * @param string $city The city
       */
      public function setCity ( string $city ): void
      {

         // Set the city
         $this->credit_card_parameters->setVariable( 'City',
                                                     $city );

      }


      /**
       * Gets the city
       *
       * @return ?string
       */
      public function getCity (): ?string
      {

         // Get the city
         return $this->credit_card_parameters->getVariable( 'City' );

      }


      /**
       * Sets the state
       *
       * @param string $state The state
       */
      public function setState ( string $state ): void
      {

         // Set the state
         $this->credit_card_parameters->setVariable( 'State',
                                                     $state );

      }


      /**
       * Gets the state
       *
       * @return ?string
       */
      public function getState (): ?string
      {

         // Get the state
         return $this->credit_card_parameters->getVariable( 'State' );

      }


      /**
       * Sets the postcode
       *
       * @param string $postcode The postcode
       */
      public function setPostcode ( string $postcode ): void
      {

         // Set the postcode
         $this->credit_card_parameters->setVariable( 'Postcode',
                                                     $postcode );

      }


      /**
       * Gets the postcode
       *
       * @return ?string
       */
      public function getPostcode (): ?string
      {

         // Get the postcode
         return $this->credit_card_parameters->getVariable( 'Postcode' );

      }


      /**
       * Sets the country
       *
       * @param string $country The country
       */
      public function setCountry ( string $country ): void
      {

         // Set the country
         $this->credit_card_parameters->setVariable( 'Country',
                                                     $country );

      }


      /**
       * Gets the country
       *
       * @return ?string
       */
      public function getCountry (): ?string
      {

         // Get the country
         return $this->credit_card_parameters->getVariable( 'Country' );

      }


      /**
       * Sets the phone
       *
       * @param ?string $phone The phone
       */
      public function setPhone ( ?string $phone ): void
      {

         // Set the phone
         $this->credit_card_parameters->setVariable( 'Phone',
                                                     $phone );

      }


      /**
       * Gets the phone
       *
       * @return ?string
       */
      public function getPhone (): ?string
      {

         // Get the phone
         return $this->credit_card_parameters->getVariable( 'Phone' );

      }


      /**
       * Sets the credit card number
       *
       * @param string $credit_card_number The credit card number
       */
      public function setCreditCardNumber ( string $credit_card_number ): void
      {

         // Set the number
         $this->credit_card_parameters->setVariable( 'number',
                                                     $credit_card_number );

      }


      /**
       * Gets the credit card number
       *
       * @return ?string
       */
      public function getCreditCardNumber (): ?string
      {

         // Get the number
         return $this->credit_card_parameters->getVariable( 'number' );

      }


      /**
       * Sets the credit card expiry month
       *
       * @param string $expiry_month The credit card expiry month (2 digit)
       */
      public function setCreditCardExpiryMonth ( string $expiry_month ): void
      {

         // Set the expiry month
         $this->credit_card_parameters->setVariable( 'expiryMonth',
                                                     $expiry_month );

      }


      /**
       * Gets the credit card expiry month
       *
       * @return ?string
       */
      public function getCreditCardExpiryMonth (): ?string
      {

         // Get the expiry month
         return $this->credit_card_parameters->getVariable( 'expiryMonth' );

      }


      /**
       * Sets the credit card expiry year
       *
       * @param string $expiry_year The credit card expiry year (4 digit)
       */
      public function setCreditCardExpiryYear ( string $expiry_year ): void
      {

         // Set the expiry year
         $this->credit_card_parameters->setVariable( 'expiryYear',
                                                     $expiry_year );

      }


      /**
       * Gets the credit card expiry year
       *
       * @return ?string
       */
      public function getCreditCardExpiryYear (): ?string
      {

         // Get the expiry year
         return $this->credit_card_parameters->getVariable( 'expiryYear' );

      }


      /**
       * Sets the credit card CVV
       *
       * @param string $cvv The credit card CVV
       */
      public function setCreditCardCVV ( string $cvv ): void
      {

         // Set the cvv
         $this->credit_card_parameters->setVariable( 'cvv',
                                                     $cvv );

      }


      /**
       * Gets the credit card CVV
       *
       * @return ?string
       */
      public function getCreditCardCVV (): ?string
      {

         // Get the cvv
         return $this->credit_card_parameters->getVariable( 'cvv' );

      }

   }