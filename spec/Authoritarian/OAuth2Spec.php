<?php

namespace spec\Authoritarian;

use Guzzle\Http\Client;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Authoritarian\Flow\ResourceOwnerPasswordFlow;

class OAuth2Spec extends ObjectBehavior
{
    public $responses;

    public function let()
    {
        $client = new Client();
        $this->responses = new MockPlugin();
        $client->addSubscriber($this->responses);

        $this->beConstructedWith($client);
        $this->setTokenUrl('http://example.com/oauth/token');
        $this->setClientCredential('username', 'password');
    }

    public function it_should_be_initializable()
    {
        $this->shouldHaveType('Authoritarian\OAuth2');
    }

    public function it_should_get_the_response_of_the_flow_request()
    {
        $response = new Response(
            200,
            null,
            'response'
        );
        $this->responses->addResponse($response);

        $this->requestAccessToken(new ResourceOwnerPasswordFlow('', ''))
            ->shouldHaveType('Guzzle\Http\Message\Response');
    }
}

