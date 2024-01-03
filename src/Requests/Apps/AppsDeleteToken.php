<?php

namespace Tonning\Github\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/delete-token
 *
 * OAuth  or GitHub application owners can revoke a single token for an OAuth application or a GitHub
 * application with an OAuth authorization. You must use [Basic
 * Authentication](https://docs.github.com/rest/overview/other-authentication-methods#basic-authentication)
 * when accessing this endpoint, using the application's `client_id` and `client_secret` as the
 * username and password.
 */
class AppsDeleteToken extends Request
{
    protected Method $method = Method::DELETE;

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
