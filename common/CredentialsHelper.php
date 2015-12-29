<?php
namespace Mastercard\common;

use \Mastercard\common\Environment;

class CredentialsHelper {
    private $keystorePassword;
    private $keystorePath;
    private $consumerKey;
    private $certificatePath;

    public function __construct($environment)
    {
        $this->environment = $environment;

        $config = parse_ini_file(dirname(__FILE__)."/../config.ini", true);

        if ($this->environment == Environment::PRODUCTION)
        {
            $this->keystorePath = $config['production']['ssl_ca_cer_path'];
            $this->keystorePassword = $config['production']['ssl_ca_cer_password'];
            $this->consumerKey = $config['production']['consumer_key'];
            $this->certificatePath = $config['production']['keystore_path'];
        }
        else
        {
            $this->keystorePath = $config['sandbox']['ssl_ca_cer_path'];
            $this->keystorePassword = $config['sandbox']['ssl_ca_cer_password'];
            $this->consumerKey = $config['sandbox']['consumer_key'];
            $this->certificatePath = $config['sandbox']['keystore_path'];
        }
    }

    public function getPrivateKey()
    {

        $path = realpath($this->keystorePath);
        $keystore = array();
        $pkcs12 = file_get_contents($path);

        // Read the p12 file
        trim(openssl_pkcs12_read( $pkcs12, $keystore, $this->keystorePassword));

        // Return private key
        if(is_array($keystore) && isset($keystore['pkey']) && !empty($keystore['pkey']))
        {
            return  $keystore['pkey'];
        }
        else
        {
            throw new \Exception('Missing private key');
        }
    }

    public function getConsumerKey() {
        return $this->consumerKey;
    }

    public function getCertificateFilePath() {
        return $this->certificatePath;
    }
}
