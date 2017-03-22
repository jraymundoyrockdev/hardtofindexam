<?php

use HardToFindExam\Services\TwitterCredentialConfigService;

class UserTweets
{
    const USER_TIMELINE_URL = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    const REQUEST_METHOD = 'GET';

    /**
     * @param string $username
     * @param int $totalTweets
     *
     * @return string
     */
    public function getTweetsByUsername($username, $totalTweets=500)
    {
        $timeOnlineList = [];
        $tweets = $this->findTweets($username, $totalTweets);

        if (array_key_exists('errors', $tweets)) {
            echo $this->buildErrorResult($test->errors[0]->message);
            die;
        }

        foreach ($tweets as $tweet) {
            $timeOnlineList[] = $this->extractHourAndMinutes($tweet->created_at);
        }

        echo json_encode($timeOnlineList);
    }

    /**
     * @param string $username
     *
     * @param int $totalTweets
     */
    private function findTweets($username, $totalTweets)
    {
        $twitter = new TwitterAPIExchange(TwitterCredentialConfigService::getCredentials());

        $result = $twitter->setGetfield($this->buildQueryParams($username, $totalTweets))
                    ->buildOauth(self::USER_TIMELINE_URL, self::REQUEST_METHOD)
                    ->performRequest();

        return json_decode($result);
    }

    /**
     * @param string $message
     *
     * @return string
     */
    private function buildErrorResult($message)
    {
        return json_encode(['errors' => $message]);
    }

    /**
     * @param string $username
     * @param int $totalTweets
     *
     * @return string
     */
    private function buildQueryParams($username, $totalTweets)
    {
        return '?screen_name=' . $username . ' &count= '.$totalTweets;
    }

    /**
     * @param string $dateTime
     *
     * @return string
     */
    private function extractHourAndMinutes($dateTime)
    {
        $date = new DateTime($dateTime);

        return $date->format('H:i');
    }

}
