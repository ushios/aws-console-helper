<?php

namespace Ushios\Component\AwsConsoleHelper\Common;

use Aws\Common\Aws;

abstract class AbstractClientWrapper implements ClientWrapperInterface
{
    /**
     * Aws client
     * @var Aws\Common\Aws
     */
    protected $aws;
    
    /**
     * Ec2 client
     * @var Aws\Ec2\Ec2Client
     */
    protected $ec2;
    
    /**
     * {@inheritdoc}
     */
    public function setAwsClient(Aws $aws)
    {
        $this->aws = $aws;
        $this->ec2 = $aws->get('ec2');
    }
}