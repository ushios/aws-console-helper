<?php
require_once __DIR__.'/bootstrap.php';

use Ushios\Component\AwsConsoleHelper\Ssh\SshConfigBuilder;
use Aws\Common\Aws;

$options = getopt("", array(
        "output:",
        "private",
        "no-hostkey-checking",
        "identity_file::",
        "user::"
));

// make options
$sp = DIRECTORY_SEPARATOR;
$private = isset($options['private']);
$noHostkeyChecking = isset($options['no-hostkey-checking']);
if (is_null($options['output'])) throw new \Exception('output option is required.');
$outputPath = isset($options['output']) ? $options['output'] : "~".$sp.".ssh".$sp."config";
$user = isset($options['user']) ? $options['user'] : null;
$identityFile = isset($options['identity_file']) ? $options['identity_file'] : null;


// get aws client.
$aws = Aws::factory(__DIR__."/Resources/config.json");

// get config builder and make cofnig.
$builder = new SshConfigBuilder();
$builder->setAwsClient($aws);
$config = $builder->getConfigs(array(
        "Private" => $private,
        "User" => $user,
        "IdentityFile" => $identityFile
));

// make config string.
$loader = new Twig_Loader_Filesystem(__DIR__.'/Resources/templates');
$twig = new Twig_Environment($loader, array(
        'cache' => __DIR__.'/cache',
));
$output = $twig->render('ssh_config.twig', array(
        "config" => $config,
        "NoStrictHostKeyChecking" => $noHostkeyChecking
));

// output to file.
$timestampString = date("YmdHis");
if (file_exists($outputPath)){
    rename($outputPath, $outputPath."_".$timestampString);
}

file_put_contents($outputPath, $output);