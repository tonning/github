<?php

namespace Tonning\Github\Requests\Apps;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * apps/scope-token
 *
 * Use a non-scoped user access token to create a repository scoped and/or permission scoped user
 * access token. You can specify which repositories the token can access and which permissions are
 * granted to the token. You must use [Basic
 * Authentication](https://docs.github.com/rest/overview/other-authentication-methods#basic-authentication)
 * when accessing this endpoint, using the `client_id` and `client_secret` of the GitHub App as the
 * username and password. Invalid tokens will return `404 NOT FOUND`.
 */
class AppsScopeToken extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/applications/{$this->clientId}/token/scoped";
	}


	/**
	 * @param string $clientId The client ID of the GitHub app.
	 */
	public function __construct(
		protected string $clientId,
	) {
	}
}
