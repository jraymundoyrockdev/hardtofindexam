<?php

namespace HardToFindExam\Services;

class TwitterCredentialConfigService
{
  /**
   * @param string $type
   *
   * @return array
   */
    public static function getCredentials($type='default')
    {
        $credentials = [
            'default' => [
              'oauth_access_token' => "724428917134630913-dwcK73XpPIwi6hmS5kVC6ID1HCSWYKf",
              'oauth_access_token_secret' => "TWI5XG0JmVB8zyf3hBKb1lYmuW74pwn1KeBmolqmo2Q8Z",
              'consumer_key' => "yzgCtLGl3dDWykRwj7TvX8Ib1",
              'consumer_secret' => "1nciVYpCDB2hKynr89oUeteQRNQCdZQWARIeCRQHgKgvwwxnYP"
            ]
        ];

        return $credentials[$type];
    }
}
