<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/create-repo-variable
 *
 * Creates a repository variable that you can reference in a GitHub Actions workflow.
 *
 * You must
 * authenticate using an access token with the `repo` scope to use this endpoint.
 * GitHub Apps must have
 * the `actions_variables:write` repository permission to use this endpoint.
 * Authenticated users must
 * have collaborator access to a repository to create, update, or read variables.
 */
class ActionsCreateRepoVariable extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/actions/variables";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
	) {
	}
}
