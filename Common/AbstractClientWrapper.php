<?php

namespace Ushios\Component\AwsConsoleHelper\Common;

use Aws\Common\Aws;

/**
 * Abstract AWS client wrapper.
 * @author ushio
 *
 */
abstract class AbstractClientWrapper implements ClientWrapperInterface
{
    /**
     * Aws client
     * @var Aws\Common\Aws
     */
    protected $aws;
    
    /**
     * {@inheritdoc}
     */
    public function setAwsClient(Aws $aws)
    {
        $this->aws = $aws;
    }
}