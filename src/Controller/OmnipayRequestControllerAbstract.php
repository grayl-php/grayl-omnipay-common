<?php

   namespace Grayl\Omnipay\Common\Controller;

   use Grayl\Gateway\Common\Controller\RequestControllerAbstract;
   use Grayl\Omnipay\Common\Entity\OmnipayRequestDataAbstract;

   /**
    * Abstract class OmnipayRequestControllerAbstract
    * The abstract class of the controller for working with OmnipayRequestDataAbstract entities
    * @method OmnipayRequestDataAbstract getRequestData()
    * @method OmnipayResponseControllerAbstract sendRequest()
    *
    * @package Grayl\Omnipay\Common
    */
   abstract class OmnipayRequestControllerAbstract extends RequestControllerAbstract implements OmnipayRequestControllerInterface
   {

      // No overrides to the abstract class

   }