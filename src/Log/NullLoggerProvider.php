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
use Psr\Log\NullLogger;

final class NullLoggerProvider implements LoggerProvider
{
    /**
     * @var NullLogger
     */
    private readonly NullLogger $logger;

    /**
     */
    public function __construct()
    {
        $this->logger = new NullLogger();
    }

    /**
     * {@inheritdoc}
     */
    public function getLogger(string $name): LoggerInterface
    {
        return $this->logger;
    }
}
