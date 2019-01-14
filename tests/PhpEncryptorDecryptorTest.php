<?php


use PhpEncryptDecrypt\PhpEncryptorDecryptor;

class PhpEncryptorDecryptorTest extends \PHPUnit\Framework\TestCase
{
    public function testCanEncrypt()
    {
        $this->assertSame(
            'emE1THBkdStoWGVhT3E3Q0xJbnJyQT09',
            self::encryptorDecryptor()->encrypt('baklazhan')
        );
    }

    public function testCanDecrypt()
    {
        $this->assertSame(
            'baklazhan',
            self::encryptorDecryptor()->decrypt('emE1THBkdStoWGVhT3E3Q0xJbnJyQT09')
        );
    }

    public function testReturnFalseWhenDecryptWithWrongSecrets()
    {
        $this->assertFalse(
            (new PhpEncryptorDecryptor('wrong secretKey', 'wrong secretIv'))
                ->decrypt('emE1THBkdStoWGVhT3E3Q0xJbnJyQT09')
        );
    }

    private static function encryptorDecryptor()
    {
        return new PhpEncryptorDecryptor('secretKey', 'secretIv');
    }
}
