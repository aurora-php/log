<?php

declare(strict_types=1);

/*
 * This file is part of the Aurora Project.
 *
 * (c) Tentifly <info@tentifly.com>
 *
 * This file is subject to the MIT license.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Aurora\Log;

use Psr\Log\LoggerInterface;

final class CachingLoggerProvider implements LoggerProvider
{
    /**
     * @var array<string, LoggerInterface>
     */
    private array $cache = [];

    /**
     * @param LoggerProvider $provider
     */
    public function __construct(
        private readonly LoggerProvider $provider
    ) {}

    /**
     * {@inheritdoc}
     */
    public function getLogger(string $name): LoggerInterface
    {
        if (\array_key_exists($name, $this->cache)) {
            return $this->cache[$name];
        }
        $logger = $this->provider->getLogger($name);
        $this->cache[$name] = $logger;

        return $logger;
    }
}
