<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-app-installations
 *
 * Lists all GitHub Apps in an organization. The installation count includes all GitHub Apps installed
 * on repositories in the organization. You must be an organization owner with `admin:read` scope to
 * use this endpoint.
 */
class OrgsListAppInstallations extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/installations";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $org,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
