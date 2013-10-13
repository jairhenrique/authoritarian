<?php

namespace Authoritarian;


/**
 * Authorization interface to obtain the user's Access Token
 */
interface AuthorizationInterface
{
    /**
     * Requests the token endpoint and get the user's Access Token
     *
     * @param \Authoritarian\Flow\FlowInterface $flow  The Oauth2 flow
     *
     * @return array
     */
    public function requestAccessToken(Flow\FlowInterface $flow);
}
