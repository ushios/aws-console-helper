<?php
namespace Ushios\Component\AwsConsoleHelper\Tests;

use Ushios\Component\AwsConsoleHelper\Ssh\SshConfigBuilder;
use Aws\Common\Aws;

class SshConfigBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInstance()
    {
        $sshConfigBuilder = new SshConfigBuilder();
        
        $this->assertInstanceOf('Ushios\Component\AwsConsoleHelper\Ssh\SshConfigBuilder', $sshConfigBuilder);
    }
    
    public function testSetAwsClient()
    {
        $sshConfigBuilder = new SshConfigBuilder();
        
        $aws = Aws::factory(array(
            'key'    => 'AKIAIXSJE53LUYQ32XTQ',
            'secret' => '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',
            'region' => 'ap-northeast-1'
        ));
        
        $sshConfigBuilder->setAwsClient($aws);
    }
}