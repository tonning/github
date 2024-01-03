<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/set-github-actions-permissions-repository
 *
 * Sets the GitHub Actions permissions policy for enabling GitHub Actions and allowed actions and
 * reusable workflows in the repository.
 *
 * You must authenticate using an access token with the `repo`
 * scope to use this endpoint. GitHub Apps must have the `administration` repository permission to use
 * this API.
 */
class ActionsSetGithubActionsPermissionsRepository extends Request
{
	protected Method $method = Method::PUT;


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
