<?php

namespace Tonning\Github\Requests\Apps;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/list-plans
 *
 * Lists all plans that are part of your GitHub Marketplace listing.
 *
 * GitHub Apps must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint. OAuth apps must use [basic
 * authentication](https://docs.github.com/rest/overview/other-authentication-methods#basic-authentication)
 * with their client ID and client secret to access this endpoint.
 */
class AppsListPlans extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/marketplace_listing/plans";
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
