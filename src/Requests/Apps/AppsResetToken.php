<?php

namespace Tonning\Github\Requests\Apps;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * apps/reset-token
 *
 * OAuth applications and GitHub applications with OAuth authorizations can use this API method to
 * reset a valid OAuth token without end-user involvement. Applications must save the "token" property
 * in the response because changes take effect immediately. You must use [Basic
 * Authentication](https://docs.github.com/rest/overview/other-authentication-methods#basic-authentication)
 * when accessing this endpoint, using the application's `client_id` and `client_secret` as the
 * username and password. Invalid tokens will return `404 NOT FOUND`.
 */
class AppsResetToken extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/applications/{$this->clientId}/token";
    }

    /**
     * @param  string  $clientId The client ID of the GitHub app.
     */
    public function __construct(
        protected string $clientId,
    ) {
    }
}
