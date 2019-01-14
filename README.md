# php-encrypt-decrypt
Simple PHP encryptor-decryptor using openssl

## Usage

`$phpEncryptorDecryptor = new PhpEncryptorDecryptor('secretKey', 'secretIv');`
#### Encryptor
`$phpEncryptorDecryptor->encrypt('string);`
#### Decryptor
`$phpEncryptorDecryptor->decrypt('encrypted string);`
