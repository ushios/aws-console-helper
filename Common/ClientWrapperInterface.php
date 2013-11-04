<?php

namespace Ushios\Component\AwsConsoleHelper\Common;

use Aws\Common\Aws;

interface ClientWrapperInterface
{
    /**
     * Set aws client.
     * @param Aws $aws
     */
    public function setAwsClient(Aws $aws);
}