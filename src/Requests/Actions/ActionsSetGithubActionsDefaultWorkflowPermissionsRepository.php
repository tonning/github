<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/set-github-actions-default-workflow-permissions-repository
 *
 * Sets the default workflow permissions granted to the `GITHUB_TOKEN` when running workflows in a
 * repository, and sets if GitHub Actions
 * can submit approving pull request reviews.
 * For more
 * information, see "[Setting the permissions of the GITHUB_TOKEN for your
 * repository](https://docs.github.com/repositories/managing-your-repositorys-settings-and-features/enabling-features-for-your-repository/managing-github-actions-settings-for-a-repository#setting-the-permissions-of-the-github_token-for-your-repository)."
 *
 * You
 * must authenticate using an access token with the `repo` scope to use this endpoint. GitHub Apps must
 * have the repository `administration` permission to use this API.
 */
class ActionsSetGithubActionsDefaultWorkflowPermissionsRepository extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/actions/permissions/workflow";
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
