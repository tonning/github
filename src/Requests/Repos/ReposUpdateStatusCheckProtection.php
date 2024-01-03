<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/update-status-check-protection
 *
 * Protected branches are available in public repositories with GitHub Free and GitHub Free for
 * organizations, and in public and private repositories with GitHub Pro, GitHub Team, GitHub
 * Enterprise Cloud, and GitHub Enterprise Server. For more information, see [GitHub's
 * products](https://docs.github.com/github/getting-started-with-github/githubs-products) in the GitHub
 * Help documentation.
 *
 * Updating required status checks requires admin or owner permissions to the
 * repository and branch protection to be enabled.
 */
class ReposUpdateStatusCheckProtection extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/branches/{$this->branch}/protection/required_status_checks";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected string $branch,
	) {
	}
}