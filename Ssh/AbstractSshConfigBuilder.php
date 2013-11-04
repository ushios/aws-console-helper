<?php

namespace Ushios\Component\AwsConsoleHelper\Ssh;

use Aws\Common\Aws;

use Ushios\Component\AwsConsoleHelper\Common\AbstractClientWrapper;

/**
 * Abstract ssh config builder.
 * @author ushio
 *
 */
abstract class AbstractSshConfigBuilder extends AbstractClientWrapper implements  SshConfigBuilderInterface
{
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
        parent::setAwsClient($aws);
        $this->ec2 = $aws->get('ec2');
    }
    
    /**
     * Describe instances.
     * @param array $options
     */
    protected function doGetInstances(array $options = array())
    {
        $result = $this->ec2->describeInstances($options);
        
        return $result;
    }
}