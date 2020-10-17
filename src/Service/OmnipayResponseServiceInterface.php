<?php

namespace Grayl\Omnipay\Common\Service;

use Grayl\Gateway\Common\Service\ResponseServiceInterface;
use Grayl\Omnipay\Common\Entity\OmnipayResponseDataAbstract;

/**
 * Interface OmnipayResponseServiceInterface
 * This interface describes all Omnipay payment gateway responses
 *
 * @package Grayl\Omnipay\Common
 */
interface OmnipayResponseServiceInterface extends
    ResponseServiceInterface
{

    /**
     * Returns a true / false value if a payment is still pending from a gateway API response
     *
     * @param OmnipayResponseDataAbstract|object $response_data The response object to check
     *
     * @return bool
     */
    public function isPending(object $response_data): bool;


    /**
     * Returns the AVS result code from a gateway API response
     *
     * @param OmnipayResponseDataAbstract|object $response_data The response object to pull the AVS code from
     *
     * @return string
     */
    public function getAVSCode(object $response_data): ?string;


    /**
     * Returns the CVV result code from a gateway API response
     *
     * @param OmnipayResponseDataAbstract|object $response_data The response object to pull the CVV code from
     *
     * @return string
     */
    public function getCVVCode(object $response_data): ?string;


    /**
     * Checks if a gateway is requesting an offsite redirect for payment
     *
     * @param OmnipayResponseDataAbstract|object $response_data The response object to check for redirection
     *
     * @return bool
     */
    public function isRedirect(object $response_data): bool;


    /**
     * Returns the URL for responses that require an offsite redirect for payment
     *
     * @param OmnipayResponseDataAbstract|object $response_data The response object to get the URL from
     *
     * @return string
     */
    public function getRedirectURL(object $response_data): ?string;

}