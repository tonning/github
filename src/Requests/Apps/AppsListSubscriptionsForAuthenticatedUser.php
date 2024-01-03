<?php

namespace Tonning\Github\Requests\Apps;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/list-subscriptions-for-authenticated-user
 *
 * Lists the active subscriptions for the authenticated user. GitHub Apps must use a [user access
 * token](https://docs.github.com/apps/creating-github-apps/authenticating-with-a-github-app/generating-a-user-access-token-for-a-github-app),
 * created for a user who has authorized your GitHub App, to access this endpoint. OAuth apps must
 * authenticate using an [OAuth
 * token](https://docs.github.com/apps/oauth-apps/building-oauth-apps/authorizing-oauth-apps).
 */
class AppsListSubscriptionsForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/marketplace_purchases";
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
