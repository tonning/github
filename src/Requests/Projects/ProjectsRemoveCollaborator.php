<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/remove-collaborator
 *
 * Removes a collaborator from an organization project. You must be an organization owner or a project
 * `admin` to remove a collaborator.
 */
class ProjectsRemoveCollaborator extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/projects/{$this->projectId}/collaborators/{$this->username}";
    }

    /**
     * @param  int  $projectId The unique identifier of the project.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function __construct(
        protected int $projectId,
        protected string $username,
    ) {
    }
}
