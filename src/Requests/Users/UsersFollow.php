<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/follow
 *
 * Note that you'll need to set `Content-Length` to zero when calling out to this endpoint. For more
 * information, see "[HTTP
 * verbs](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#http-method)."
 *
 * Following
 * a user requires the user to be logged in and authenticated with basic auth or OAuth with the
 * `user:follow` scope.
 */
class UsersFollow extends Request
{
	protected Method $method = Method::PUT;


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
