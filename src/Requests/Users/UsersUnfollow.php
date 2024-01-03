<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/unfollow
 *
 * Unfollowing a user requires the user to be logged in and authenticated with basic auth or OAuth with
 * the `user:follow` scope.
 */
class UsersUnfollow extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/user/following/{$this->username}";
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 */
	public function __construct(
		protected string $username,
	) {
	}
}
