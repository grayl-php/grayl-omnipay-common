<?php

namespace Grayl\Omnipay\Common;

use Grayl\Gateway\Common\GatewayPorterInterface;
use Grayl\Omnipay\Common\Entity\OmnipayGatewayCreditCard;

/**
 * Interface OmnipayInjectorInterface
 * This interface describes the porter for all Omnipay based gateways
 *
 * @package Grayl\Omnipay\Common
 */
interface OmnipayPorterInterface extends
    GatewayPorterInterface
{

    /**
     * Grabs any offsite URLs for the environment
     *
     * @return array
     */
    public function getOffsiteURLs(): array;


    /**
     * Creates a new OmnipayGatewayCreditCard entity
     *
     * @param string $number The credit card number
     * @param int    $month  The credit card expiry month (2 digit)
     * @param int    $year   The credit card expiry year (4 digit)
     * @param string $cvv    The credit card CVV
     *
     * @return OmnipayGatewayCreditCard
     */
    public function newOmnipayGatewayCreditCard(
        string $number,
        int $month,
        int $year,
        string $cvv
    ): OmnipayGatewayCreditCard;

}