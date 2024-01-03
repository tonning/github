<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-github-actions-permissions-repository
 *
 * Gets the GitHub Actions permissions policy for a repository, including whether GitHub Actions is
 * enabled and the actions and reusable workflows allowed to run in the repository.
 *
 * You must
 * authenticate using an access token with the `repo` scope to use this endpoint. GitHub Apps must have
 * the `administration` repository permission to use this API.
 */
class ActionsGetGithubActionsPermissionsRepository extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/actions/permissions";
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
