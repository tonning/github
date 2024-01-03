<?php

namespace Tonning\Github\Requests\Checks;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * checks/list-suites-for-ref
 *
 * Lists check suites for a commit `ref`. The `ref` can be a SHA, branch name, or a tag name.
 *
 * GitHub
 * Apps must have the `checks:read` permission on a private repository or pull access to a public
 * repository to list check suites. OAuth apps and authenticated users must have the `repo` scope to
 * get check suites in a private repository.
 *
 * **Note:** The endpoints to manage checks only look for
 * pushes in the repository where the check suite or check run were created. Pushes to a branch in a
 * forked repository are not detected and return an empty `pull_requests` array and a `null` value for
 * `head_branch`.
 */
class ChecksListSuitesForRef extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/commits/{$this->ref}/check-suites";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $ref The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
	 * @param null|int $appId Filters check suites by GitHub App `id`.
	 * @param null|string $checkName Returns check runs with the specified `name`.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected string $ref,
		protected ?int $appId = null,
		protected ?string $checkName = null,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['app_id' => $this->appId, 'check_name' => $this->checkName, 'page' => $this->page]);
	}
}
