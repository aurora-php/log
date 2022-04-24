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

final class LoggerFactory
{
    /**
     * @var LoggerProvider
     */
    private static LoggerProvider $provider;

    /**
     * @param string $name
     *
     * @return LoggerInterface
     */
    public static function getLogger(string $name): LoggerInterface
    {
        return LoggerFactory::$provider->getLogger($name);
    }

    /**
     * @param LoggerProvider $provider
     */
    public static function setProvider(LoggerProvider $provider): void
    {
        LoggerFactory::$provider = $provider;
    }
}
