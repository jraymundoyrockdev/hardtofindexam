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
              'oauth_access_token' => "",
              'oauth_access_token_secret' => "",
              'consumer_key' => "",
              'consumer_secret' => ""
            ]
        ];

        return $credentials[$type];
    }
}
