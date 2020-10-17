<?php

namespace Grayl\Omnipay\Common\Controller;

use Grayl\Gateway\Common\Controller\ResponseControllerInterface;

/**
 * Interface OmnipayResponseControllerInterface
 * This interface describes the controller for all Omnipay based gateway responses
 *
 * @package Grayl\Omnipay\Common
 */
interface OmnipayResponseControllerInterface extends
    ResponseControllerInterface
{

    /**
     * Returns a true / false value based on the pending status from a gateway API response
     *
     * @return bool
     */
    public function isPending(): bool;


    /**
     * Gets the payment amount from a gateway API response
     *
     * @return float
     */
    public function getAmount(): ?float;


    /**
     * Returns the AVS result code from a gateway API response
     *
     * @return string
     */
    public function getAVSCode(): ?string;


    /**
     * Returns the CVV result code from a gateway API response
     *
     * @return string
     */
    public function getCVVCode(): ?string;


    /**
     * Checks if the response requires an offsite redirect
     *
     * @return bool
     */
    public function isRedirect(): bool;


    /**
     * Returns the redirect URL from a gateway API response
     *
     * @return string
     */
    public function getRedirectURL(): ?string;

}