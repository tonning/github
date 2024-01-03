<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-repo-rulesets
 *
 * Get all the rulesets for a repository.
 */
class ReposGetRepoRulesets extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/rulesets";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param null|int $page Page number of the results to fetch.
	 * @param null|bool $includesParents Include rulesets configured at higher levels that apply to this repository
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected ?int $page = null,
		protected ?bool $includesParents = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page, 'includes_parents' => $this->includesParents]);
	}
}
