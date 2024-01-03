<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/list-ssh-signing-keys-for-authenticated-user
 *
 * Lists the SSH signing keys for the authenticated user's GitHub account. You must authenticate with
 * Basic Authentication, or you must authenticate with OAuth with at least `read:ssh_signing_key`
 * scope. For more information, see "[Understanding scopes for OAuth
 * apps](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/)."
 */
class UsersListSshSigningKeysForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/ssh_signing_keys";
	}


	/**
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
