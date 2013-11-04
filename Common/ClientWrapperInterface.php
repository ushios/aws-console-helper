<?php

namespace Ushios\Component\AwsConsoleHelper\Common;

use Aws\Common\Aws;

/**
 * Aws client wrapper interface.
 * @author ushio
 *
 */
interface ClientWrapperInterface
{
    /**
     * Set aws client.
     * @param Aws $aws
     */
    public function setAwsClient(Aws $aws);
}