<?php

namespace Authoritarian\Flow;

use Authoritarian\Credential\ClientCredential;

/**
 *  Authorization Flow interface to generate Access Token Requests
 */
interface FlowInterface
{
    /**
     * @param Guzzle\Http\ClientInterface $client The HTTP Client
     */
    public function setHttpClient(\Guzzle\Http\ClientInterface $client);

    /**
     * @param Authoritarian\Credential\ClientCredential $credential The App's
     * Client Credentials
     */
    public function setClientCredential(ClientCredential $credential);

    /**
     * @param string $scope The scope the app is requiring access
     */
    public function setScope($scope);


    /**
     * @param string $token_url The URL to request the Access Token
     */
    public function setTokenUrl($token_url);

    /**
     * Get the request to the Access Token
     *
     * @throws Authoritarian\Exception\Flow\MissingTokenUrlException When the OAuth token URL wasn't set
     *
     * @return \Guzzle\Http\Message\RequestInterface
     */
    public function getRequest();
}

