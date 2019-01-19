<?php

/**
 * PHP Service Bus (publish-subscribe pattern) amqp transport implementation
 *
 * @author  Maksim Masiukevich <dev@async-php.com>
 * @license MIT
 * @license https://opensource.org/licenses/MIT
 */

declare(strict_types = 1);

namespace ServiceBus\Transport\Amqp;

use ServiceBus\Transport\Common\DeliveryDestination;

/**
 * Which exchange (and with which key) the message will be sent to
 *
 * @property-read string      $exchange
 * @property-read string|null $routingKey
 */
final class AmqpTransportLevelDestination implements DeliveryDestination
{
    /**
     * @var string
     */
    public $exchange;

    /**
     * @var string|null
     */
    public $routingKey;

    /**
     * @param string      $exchange
     * @param string|null $routingKey
     *
     * @return self
     */
    public static function create(string $exchange, ?string $routingKey): self
    {
        return new self($exchange, $routingKey);
    }

    /**
     * @param string      $exchange
     * @param string|null $routingKey
     */
    private function __construct(string $exchange, ?string $routingKey)
    {
        $this->exchange   = $exchange;
        $this->routingKey = $routingKey;
    }
}
