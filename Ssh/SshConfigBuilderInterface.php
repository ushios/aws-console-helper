<?php

namespace Ushios\Component\AwsConsoleHelper\Ssh;

use Aws\Common\Aws;

/**
 * Make ~/.ssh/config for EC2 interface.
 * @author ushio
 *
 */
interface SshConfigBuilderInterface
{
    /**
     * Get configs.
     */
    public function getConfigs();
}