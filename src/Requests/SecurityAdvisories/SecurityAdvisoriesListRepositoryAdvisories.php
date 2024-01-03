<?php

namespace Tonning\Github\Requests\SecurityAdvisories;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * security-advisories/list-repository-advisories
 *
 * Lists security advisories in a repository.
 * You must authenticate using an access token with the
 * `repo` scope or `repository_advisories:read` permission
 * in order to get published security
 * advisories in a private repository, or any unpublished security advisories that you have access
 * to.
 *
 * You can access unpublished security advisories from a repository if you are a security manager
 * or administrator of that repository, or if you are a collaborator on any security advisory.
 */
class SecurityAdvisoriesListRepositoryAdvisories extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/security-advisories";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param null|string $direction The direction to sort the results by.
	 * @param null|string $sort The property to sort the results by.
	 * @param null|string $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
	 * @param null|string $state Filter by state of the repository advisories. Only advisories of this state will be returned.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected ?string $direction = null,
		protected ?string $sort = null,
		protected ?string $before = null,
		protected ?string $state = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['direction' => $this->direction, 'sort' => $this->sort, 'before' => $this->before, 'state' => $this->state]);
	}
}
