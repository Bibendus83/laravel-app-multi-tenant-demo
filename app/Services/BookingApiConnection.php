<?php
namespace App\Services;

class BookingApiConnection
{
    protected $authenticate;
    protected $url;
    protected $headers;
    protected $provider;
    protected $token;

    public function __construct($authenticate = true)
    {
        $this->authenticate = $authenticate;
        $this->url = setting('api_url', 'UNSET_OAUTH_SERVICE_API');
        $this->headers = [
            'cache-control' => 'no-cache',
            'content-type' => 'application/x-www-form-urlencoded',
        ];

        // Note: the GenericProvider requires the `urlAuthorize` option, even though
        // it's not used in the OAuth 2.0 client credentials grant type.
        $this->provider = new \League\OAuth2\Client\Provider\GenericProvider([
            'clientId'                => setting('api_client_id'),    // The client ID assigned to you by the provider
            'clientSecret'            => setting('api_client_secret'),    // The client password assigned to you by the provider
            'redirectUri'             => url('/'),
            'urlAuthorize'            => $this->url.'/oauth/authorize',
            'urlAccessToken'          => $this->url.'/oauth/token',
            'urlResourceOwnerDetails' => $this->url.'/oauth/resource',
        ]);
    }

    public function getProvider()
    {
        return $this->provider;
    }

    // Removed part...
}
