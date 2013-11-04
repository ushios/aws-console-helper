<?php
namespace Ushios\Component\AwsConsoleHelper\Tests;

use Ushios\Component\AwsConsoleHelper\Ssh\SshConfigBuilder;

class SshConfigBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInstance()
    {
        $sshConfigBuilder = new SshConfigBuilder();
        
        $this->assertInstanceOf('Ushios\Component\AwsConsoleHelper\Ssh\SshConfigBuilder', $sshConfigBuilder);
    }
}