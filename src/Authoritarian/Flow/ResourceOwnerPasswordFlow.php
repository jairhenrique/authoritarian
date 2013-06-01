<?php

namespace Authoritarian\Flow;

/**
 * Implementation of the Authorization Flow Interface to
 * the Resource Owner Password Flow
 **/
class ResourceOwnerPasswordFlow implements AuthorizationFlowInterface
{
    const GRANT_TYPE = 'password';

    protected $client;
    protected $tokenUrl;
    protected $clientId;
    protected $clientSecret;
    protected $scope;
    protected $username;
    protected $password;

    /**
     * Constructor
     *
     * @param Guzzle\Http\ClientInterface $client   An instance of Guzzle Client
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
        $this->clientId = $client_id;
        $this->clientSecret = $client_secret;
        $this->scope = $scope;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Set HTTP Client
     *
     * @param Guzzle\Http\ClientInterface $client An instance of Guzzle Client
     */
    public function setClient(\Guzzle\Http\ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Get the authorization request
     *
     * @return Guzzle\Http\Message\Request
     */
    public function getRequest()
    {
        return $this->client->post(
            $this->tokenUrl,
            null,
            array(
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'grant_type' => self::GRANT_TYPE,
                'scope' => $this->scope,
                'username' => $this->username,
                'password' => $this->password,
            )
        );
    }
}

