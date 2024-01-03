<?php

namespace Tonning\Github\Requests\Projects;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/add-collaborator
 *
 * Adds a collaborator to an organization project and sets their permission level. You must be an
 * organization owner or a project `admin` to add a collaborator.
 */
class ProjectsAddCollaborator extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/projects/{$this->projectId}/collaborators/{$this->username}";
	}


	/**
	 * @param int $projectId The unique identifier of the project.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function __construct(
		protected int $projectId,
		protected string $username,
	) {
	}
}
