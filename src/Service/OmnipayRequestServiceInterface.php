<?php

   namespace Grayl\Omnipay\Common\Service;

   use Grayl\Gateway\Common\Service\RequestServiceInterface;
   use Grayl\Omnipay\Common\Entity\OmnipayRequestDataAbstract;

   /**
    * Interface OmnipayRequestServiceInterface
    * This interface describes all Omnipay payment requests
    *
    * @package Grayl\Omnipay\Common
    */
   interface OmnipayRequestServiceInterface extends RequestServiceInterface
   {

      /**
       * Sets any offsite URLs specified for this processor into the request
       * URLs may reference any values set in the "main parameters" array by using tags: {parameterKey}
       *
       * @param OmnipayRequestDataAbstract $request_data The OmnipayRequestDataAbstract to translate into
       * @param array                      $urls         An array of offsite gateway URLs to translate into the request
       */
      public function translateGatewayOffsiteURLs ( $request_data,
                                                    array $urls );


      /**
       * Replaces tags in a string with their values from an associative array
       * Tags are searched for in the format: {tagKey}
       *
       * @param array  $tags   An associative array of tags to replace in the string (key = value format)
       * @param string $string The string that contains the tags to replace
       *
       * @return string
       */
      public function replaceTags ( array $tags,
                                    string $string );

   }