<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/get-by-username
 *
 * Provides publicly available information about someone with a GitHub account.
 *
 * GitHub Apps with the
 * `Plan` user permission can use this endpoint to retrieve information about a user's GitHub plan. The
 * GitHub App must be authenticated as a user. See "[Identifying and authorizing users for GitHub
 * Apps](https://docs.github.com/apps/building-github-apps/identifying-and-authorizing-users-for-github-apps/)"
 * for details about authentication. For an example response, see 'Response with GitHub plan
 * information' below"
 *
 * The `email` key in the following response is the publicly visible email address
 * from your GitHub [profile page](https://github.com/settings/profile). When setting up your profile,
 * you can select a primary email address to be “public” which provides an email entry for this
 * endpoint. If you do not set a public email address for `email`, then it will have a value of `null`.
 * You only see publicly visible email addresses when authenticated with GitHub. For more information,
 * see
 * [Authentication](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#authentication).
 *
 * The
 * Emails API enables you to list all of your email addresses, and toggle a primary email to be visible
 * publicly. For more information, see "[Emails API](https://docs.github.com/rest/users/emails)".
 */
class UsersGetByUsername extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/users/{$this->username}";
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 */
	public function __construct(
		protected string $username,
	) {
	}
}
