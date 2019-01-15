# php-encrypt-decrypt
Simple PHP encryptor-decryptor using openssl

## Install
`composer require shaggyrec/php-encrypt-decrypt`

## Usage
`$phpEncryptorDecryptor = new PhpEncryptorDecryptor('secretKey', 'secretIv');`
+ Params
    + secretKey - should have been previously generated in a cryptographically safe way, like openssl_random_pseudo_bytes
    + secretIv - should have been generated n a cryptographically safe way, like openssl_random_pseudo_bytes
+ Returns
    + object PhpEncryptDecrypt\PhpEncryptorDecryptor 
    
#### Encryptor

`$phpEncryptorDecryptor->encrypt('string);`

+ Params
    + encoding string
+ Returns
    + base64 encoded string hash

#### Decryptor
`$phpEncryptorDecryptor->decrypt('encrypted string);`

+ Params
    + decoding base64 hash string
+ Returns
    +  Decoded string
    + false if decoding was fail
