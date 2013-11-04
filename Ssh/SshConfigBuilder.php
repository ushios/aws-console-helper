<?php

namespace Ushios\Component\AwsConsoleHelper\Ssh;

/**
 * Make ~/.ssh/config for EC2 automatically.
 * @author ushio
 *
 */
class SshConfigBuilder extends AbstractSshConfigBuilder
{
    /**
     * Defautl option values.
     * @var unknown
     */
    protected $defaultOptions = array(
            "Private" => true
    );
    
    /**
     * Get configs.
     * 
     * @param array $options
     */
    public function getConfigs(array $options = array())
    {
        $reservations = $this->getInstances();
        $configs = array();
        foreach($reservations as $reservation){
            $config = $this->makeConfig($reservation, $options);
            
            $configs[] = $config;
        }
        
        return $configs;
    }
    
    /**
     * Make config
     * @param array $reservation
     */
    public function makeConfig(array $reservation, array $options = array())
    {
        if (! array_key_exists("Instances", $reservation) ) return null;
        $instances = $reservation['Instances'];
        
        if (count($instances) < 1) return null;
        $instance = $instances[0];
        
        $options = array_merge($this->defaultOptions, $options);
        
        $config = array();
        $config['hostname'] = $this->getInstanceAddress($instance, $options['Private']);
        $config['Host'] = $this->getName($instance);
        
        if (isset($options['User']) && $options['User']){
            $config['User'] = $options['User'];
        }
        
        if (isset($options['IdentityFile']) && $options['IdentityFile']){
            $config['IdentityFile'] = $options['IdentityFile'];
        }
        
        return $config;
    }
    
    /**
     * Get instance ip address.
     * @param array $instance
     * @param bool $private private = true, public = false.
     */
    protected function getInstanceAddress(array $instance, $private=true)
    {
        if ($private){
            if (!array_key_exists('PrivateIpAddress', $instance)) return null;
            return $instance['PrivateIpAddress'];
        }else {
            if (!array_key_exists('PublicIpAddress', $instance)) return null;
            return $instance['PublicIpAddress'];
        }
        
        return null;
    }
    
    /**
     * Get name of tag value.
     * @param array $instance
     */
    protected function getName(array $instance)
    {
        if(!isset($instance['Tags'])){
            return null;
        }
        
        foreach($instance['Tags'] as $tag){
            if ($tag['Key'] == 'Name'){
                return $tag['Value'];
            }
        }
        
        return null;
    }
    
    /**
     * Get instances.
     */
    public function getInstances()
    {
        $result = $this->doGetInstances();
        $result = $result->getAll();
        
        if (! array_key_exists("Reservations", $result)){
            return null;
        }
        
        return $result['Reservations'];
    }
}