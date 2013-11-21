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
        
        $aws = Aws::factory(__DIR__."/../Resources/config.json");
        
        $sshConfigBuilder->setAwsClient($aws);
    }
}