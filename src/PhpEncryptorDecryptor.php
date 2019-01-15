<?php

namespace PhpEncryptDecrypt;

class PhpEncryptorDecryptor
{
    const ENCRYPT_METHOD = 'AES-256-CBC';

    private $secretKey;

    private $secretIv;

    /**
     * PhpEncryptorDecryptor constructor.
     * @param $secretKey string
     * @param $secretIv string
     */
    public function __construct($secretKey, $secretIv)
    {

        $this->secretKey = self::secretKeyHash($secretKey);
        $this->secretIv = self::secretIvHash($secretIv);
    }

    /**
     * @param $string string
     * @return string
     */
    public function encrypt($string)
    {
        return base64_encode(
            openssl_encrypt(
                $string,
                self::ENCRYPT_METHOD,
                $this->secretKey,
                0,
                $this->secretIv
            )
        );
    }

    /**
     * @param $string
     * @return string|false
     */
    public function decrypt($string)
    {
        return openssl_decrypt(
            base64_decode($string),
            self::ENCRYPT_METHOD,
            $this->secretKey,
            0,
            $this->secretIv
        );
    }

    /**
     * @param $secretKey
     * @return string
     */
    private static function secretKeyHash($secretKey)
    {
        return hash('sha256', $secretKey);
    }

    /**
     * @param $secretIv
     * @return bool|string
     */
    private static function secretIvHash($secretIv)
    {
        return substr(hash('sha256', $secretIv), 0, 16);
    }
}
