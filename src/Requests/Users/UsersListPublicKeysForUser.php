<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/list-public-keys-for-user
 *
 * Lists the _verified_ public SSH keys for a user. This is accessible by anyone.
 */
class UsersListPublicKeysForUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/users/{$this->username}/keys";
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $username,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
