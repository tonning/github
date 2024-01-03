<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/get-permission-for-user
 *
 * Returns the collaborator's permission level for an organization project. Possible values for the
 * `permission` key: `admin`, `write`, `read`, `none`. You must be an organization owner or a project
 * `admin` to review a user's permission level.
 */
class ProjectsGetPermissionForUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/projects/{$this->projectId}/collaborators/{$this->username}/permission";
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
