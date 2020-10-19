<?php

   namespace Grayl\Omnipay\Common\Controller;

   use Grayl\Gateway\Common\Controller\ResponseControllerAbstract;
   use Grayl\Gateway\Common\Entity\ResponseDataAbstract;
   use Grayl\Gateway\Common\Service\ResponseServiceInterface;
   use Grayl\Omnipay\Common\Entity\OmnipayResponseDataAbstract;
   use Grayl\Omnipay\Common\Service\OmnipayResponseServiceAbstract;

   /**
    * Abstract class OmnipayResponseControllerAbstract
    * The abstract class of the controller for working with OmnipayResponseDataAbstract entities
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayResponseControllerAbstract extends ResponseControllerAbstract implements OmnipayResponseControllerInterface
   {

      /**
       * The OmnipayResponseDataAbstract object that holds the gateway API response
       *
       * @var OmnipayResponseDataAbstract
       */
      protected ResponseDataAbstract $response_data;

      /**
       * The OmnipayResponseServiceAbstract instance to use
       *
       * @var OmnipayResponseServiceAbstract
       */
      protected ResponseServiceInterface $response_service;


      /**
       * Returns a true / false value based on the pending status from a gateway API response
       *
       * @return bool
       */
      public function isPending (): bool
      {

         // Use the service to check the pending status of the response
         return $this->response_service->isPending( $this->response_data );
      }


      /**
       * Gets the payment amount from a gateway API response
       *
       * @return float
       */
      public function getAmount (): ?float
      {

         // Get the amount directly from the response
         return $this->response_data->getAmount();
      }


      /**
       * Returns the AVS result code from a gateway API response
       *
       * @return string
       */
      public function getAVSCode (): ?string
      {

         // Use the service to get the AVS code from the response
         return $this->response_service->getAVSCode( $this->response_data );
      }


      /**
       * Returns the CVV result code from a gateway API response
       *
       * @return string
       */
      public function getCVVCode (): ?string
      {

         // Use the service to get the CVV code from the response
         return $this->response_service->getCVVCode( $this->response_data );
      }


      /**
       * Checks if the response requires an offsite redirect
       *
       * @return bool
       */
      public function isRedirect (): bool
      {

         // Use the service to see if the response requires a redirect
         return $this->response_service->isRedirect( $this->response_data );
      }


      /**
       * Returns the redirect URL from a gateway API response
       *
       * @return string
       */
      public function getRedirectURL (): ?string
      {

         // Use the service to get the redirect URL from a response
         return $this->response_service->getRedirectURL( $this->response_data );
      }

   }