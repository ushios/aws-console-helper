<?php

namespace Ushios\Component\AwsConsoleHelper\Ssh;

use Aws\Common\Aws;

use Ushios\Component\AwsConsoleHelper\Common\AbstractClientWrapper;

abstract class AbstractSshConfigBuilder extends AbstractClientWrapper implements  SshConfigBuilderInterface
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