<?php

   namespace Grayl\Omnipay\Common\Entity;

   use Grayl\Gateway\Common\Entity\ResponseDataAbstract;
   use Omnipay\Common\Message\AbstractResponse;

   /**
    * Abstract class OmnipayResponseDataAbstract
    * The abstract class for for all Omnipay payment gateway responses
    * @method void setAPIResponse( AbstractResponse $api_response )
    * @method AbstractResponse getAPIResponse()
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayResponseDataAbstract extends ResponseDataAbstract implements OmnipayResponseDataInterface
   {

      /**
       * The raw API response entity from the gateway
       *
       * @var AbstractResponse
       */
      protected $api_response;

      /**
       * The payment amount processed by the gateway
       *
       * @var float
       */
      protected float $amount;


      /**
       * Class constructor
       *
       * @param AbstractResponse $api_response The raw response received from a gateway
       * @param string           $gateway_name The name of the gateway
       * @param string           $action       The action performed in this response (send, etc.)
       * @param float            $amount       The payment amount processed by the gateway
       */
      public function __construct ( $api_response,
                                    string $gateway_name,
                                    string $action,
                                    float $amount )
      {

         // Call the parent constructor
         parent::__construct( $api_response,
                              $gateway_name,
                              $action );

         // Set the class data
         $this->setAmount( $amount );
      }


      /**
       * Sets the total payment amount processed by the gateway
       *
       * @param float $amount The payment amount processed by the gateway
       */
      public function setAmount ( float $amount ): void
      {

         // Set the amount
         $this->amount = $amount;
      }


      /**
       * Returns the total payment amount processed by the gateway
       *
       * @return float
       */
      public function getAmount (): float
      {

         // Return the amount
         return $this->amount;
      }

   }