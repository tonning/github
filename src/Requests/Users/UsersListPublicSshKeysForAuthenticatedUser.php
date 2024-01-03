<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/list-public-ssh-keys-for-authenticated-user
 *
 * Lists the public SSH keys for the authenticated user's GitHub account. Requires that you are
 * authenticated via Basic Auth or via OAuth with at least `read:public_key`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 */
class UsersListPublicSshKeysForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/keys";
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
