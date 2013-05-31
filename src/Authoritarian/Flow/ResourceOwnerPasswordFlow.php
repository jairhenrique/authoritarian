<?php

namespace Authoritarian\Flow;

/**
 * Implementation of the Authorization Flow Interface to
 * the Resource Owner Password Flow
 **/
class ResourceOwnerPasswordFlow implements AuthorizationFlowInterface
{
    protected $client;
    protected $tokenUrl;

    /**
     * Constructor
     *
     * @param Guzzle\Http\ClientInterface $client   An implementation of the Guzzle Client
     * @param $client_id    The app's client Id
     * @param $token_url    The OAuth server endpoint to obtain the access tokens
     * @param $client_secret    The app's client secret
     * @param $scope    The data your application is requesting access to
     * @param $username The user's username to login
     * @param $password The user's password
     */
    public function __construct(
        $token_url,
        $client_id,
        $client_secret,
        $scope,
        $username,
        $password
    ) {
        $this->tokenUrl = $token_url;
    }

    public function setClient(\Guzzle\Http\ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getRequest()
    {
        return $this->client->get($this->tokenUrl);
    }
}

