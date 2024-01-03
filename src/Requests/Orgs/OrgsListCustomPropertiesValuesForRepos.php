<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-custom-properties-values-for-repos
 *
 * Lists organization repositories with all of their custom property values.
 * Organization members can
 * read these properties.
 *
 * GitHub Apps must have the `organization_custom_properties:read` organization
 * permission to use this endpoint.
 */
class OrgsListCustomPropertiesValuesForRepos extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/properties/values";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param null|int $page Page number of the results to fetch.
	 * @param null|string $repositoryQuery Finds repositories in the organization with a query containing one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub. The REST API supports the same qualifiers as the web interface for GitHub. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query). See "[Searching for repositories](https://docs.github.com/articles/searching-for-repositories/)" for a detailed list of qualifiers.
	 */
	public function __construct(
		protected string $org,
		protected ?int $page = null,
		protected ?string $repositoryQuery = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page, 'repository_query' => $this->repositoryQuery]);
	}
}
