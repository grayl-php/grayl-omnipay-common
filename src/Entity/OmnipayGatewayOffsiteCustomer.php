<?php

   namespace Grayl\Omnipay\Common\Entity;

   /**
    * Class OmnipayGatewayOffsiteCustomer
    * The entity for an offsite gateway's returned customer data (Paypal, Skrill, etc.)
    *
    * @package Grayl\Omnipay\Common
    */
   class OmnipayGatewayOffsiteCustomer
   {

      /**
       * The customer's first name
       *
       * @var string
       */
      private string $first_name;

      /**
       * The customer's last name
       *
       * @var string
       */
      private string $last_name;

      /**
       * The customer's email address
       *
       * @var string
       */
      private string $email_address;

      /**
       * The main part of the address
       *
       * @var string
       */
      private string $address_1;

      /**
       * The secondary (optional) part of the address
       *
       * @var ?string
       */
      private ?string $address_2;

      /**
       * The city
       *
       * @var string
       */
      private string $city;

      /**
       * The state
       *
       * @var string
       */
      private string $state;

      /**
       * The postcode
       *
       * @var string
       */
      private string $postcode;

      /**
       * The country
       *
       * @var string
       */
      private string $country;

      /**
       * The phone number
       *
       * @var string
       */
      private ?string $phone_number;


      /**
       * OmnipayGatewayOffsiteCustomer constructor.
       *
       * @param string  $first_name
       * @param string  $last_name
       * @param string  $email_address
       * @param string  $address_1
       * @param ?string $address_2
       * @param string  $city
       * @param string  $state
       * @param string  $postcode
       * @param string  $country
       * @param ?string $phone_number
       */
      public function __construct ( string $first_name,
                                    string $last_name,
                                    string $email_address,
                                    string $address_1,
                                    ?string $address_2,
                                    string $city,
                                    string $state,
                                    string $postcode,
                                    string $country,
                                    ?string $phone_number )
      {

         // Set the class data
         $this->setFirstName( $first_name );
         $this->setLastName( $last_name );
         $this->setEmailAddress( $email_address );
         $this->setAddress1( $address_1 );
         $this->setAddress2( $address_2 );
         $this->setCity( $city );
         $this->setState( $state );
         $this->setPostcode( $postcode );
         $this->setCountry( $country );
         $this->setPhoneNumber( $phone_number );
      }


      /**
       * Gets the first name
       *
       * @return string
       */
      public function getFirstName (): string
      {

         // Get the first name
         return $this->first_name;
      }


      /**
       * Sets the first name
       *
       * @param string $name The first name
       */
      public function setFirstName ( string $name ): void
      {

         // Set the first name
         $this->first_name = $name;
      }


      /**
       * Gets the last name
       *
       * @return string
       */
      public function getLastName (): string
      {

         // Get the last name
         return $this->last_name;
      }


      /**
       * Sets the last name
       *
       * @param string $name The last name
       */
      public function setLastName ( string $name ): void
      {

         // Set the last name
         $this->last_name = $name;
      }


      /**
       * Gets the email address
       *
       * @return string
       */
      public function getEmailAddress (): string
      {

         // Get the email address
         return $this->email_address;
      }


      /**
       * Sets the email address
       *
       * @param string $email_address The email address
       */
      public function setEmailAddress ( string $email_address ): void
      {

         // Set the email address
         $this->email_address = $email_address;
      }


      /**
       * Gets the address part 1
       *
       * @return string
       */
      public function getAddress1 (): string
      {

         // Get the address part 1
         return $this->address_1;
      }


      /**
       * Sets the address part 1
       *
       * @param string $address The address part 1
       */
      public function setAddress1 ( string $address ): void
      {

         // Set the address part 1
         $this->address_1 = $address;
      }


      /**
       * Gets the address part 2
       *
       * @return ?string
       */
      public function getAddress2 (): ?string
      {

         // Get the address part 2
         return $this->address_2;
      }


      /**
       * Sets the address part 2
       *
       * @param ?string $address The address part 2
       */
      public function setAddress2 ( ?string $address ): void
      {

         // Set the address part 2
         $this->address_2 = $address;
      }


      /**
       * Gets the city
       *
       * @return string
       */
      public function getCity (): string
      {

         // Get the city
         return $this->city;
      }


      /**
       * Sets the city
       *
       * @param string $city The city
       */
      public function setCity ( string $city ): void
      {

         // Set the city
         $this->city = $city;
      }


      /**
       * Gets the state
       *
       * @return string
       */
      public function getState (): string
      {

         // Get the state
         return $this->state;
      }


      /**
       * Sets the state
       *
       * @param string $state The state
       */
      public function setState ( string $state ): void
      {

         // Set the state
         $this->state = $state;
      }


      /**
       * Gets the postcode
       *
       * @return string
       */
      public function getPostcode (): string
      {

         // Get the postcode
         return $this->postcode;
      }


      /**
       * Sets the postcode
       *
       * @param string $postcode The postcode
       */
      public function setPostcode ( string $postcode ): void
      {

         // Set the postcode
         $this->postcode = $postcode;
      }


      /**
       * Gets the country
       *
       * @return string
       */
      public function getCountry (): string
      {

         // Get the country
         return $this->country;
      }


      /**
       * Sets the country
       *
       * @param string $country The country
       */
      public function setCountry ( string $country ): void
      {

         // Set the country
         $this->country = $country;
      }


      /**
       * Gets the phone number
       *
       * @return ?string
       */
      public function getPhoneNumber (): ?string
      {

         // Get the phone number
         return $this->phone_number;
      }


      /**
       * Sets the phone number
       *
       * @param ?string $phone_number The phone number
       */
      public function setPhoneNumber ( ?string $phone_number ): void
      {

         // Set the phone
         $this->phone_number = $phone_number;
      }

   }