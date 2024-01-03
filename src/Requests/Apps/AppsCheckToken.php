<?php

namespace Tonning\Github\Requests\Apps;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * apps/check-token
 *
 * OAuth applications and GitHub applications with OAuth authorizations can use this API method for
 * checking OAuth token validity without exceeding the normal rate limits for failed login attempts.
 * Authentication works differently with this particular endpoint. You must use [Basic
 * Authentication](https://docs.github.com/rest/overview/other-authentication-methods#basic-authentication)
 * to use this endpoint, where the username is the application `client_id` and the password is its
 * `client_secret`. Invalid tokens will return `404 NOT FOUND`.
 */
class AppsCheckToken extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

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
