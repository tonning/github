<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * users/create-ssh-signing-key-for-authenticated-user
 *
 * Creates an SSH signing key for the authenticated user's GitHub account. You must authenticate with
 * Basic Authentication, or you must authenticate with OAuth with at least `write:ssh_signing_key`
 * scope. For more information, see "[Understanding scopes for OAuth
 * apps](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/)."
 */
class UsersCreateSshSigningKeyForAuthenticatedUser extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/user/ssh_signing_keys";
	}


	public function __construct()
	{
	}
}
