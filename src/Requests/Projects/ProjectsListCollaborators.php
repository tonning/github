<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/list-collaborators
 *
 * Lists the collaborators for an organization project. For a project, the list of collaborators
 * includes outside collaborators, organization members that are direct collaborators, organization
 * members with access through team memberships, organization members with access through default
 * organization permissions, and organization owners. You must be an organization owner or a project
 * `admin` to list collaborators.
 */
class ProjectsListCollaborators extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/projects/{$this->projectId}/collaborators";
    }

    /**
     * @param  int  $projectId The unique identifier of the project.
     * @param  null|string  $affiliation Filters the collaborators by their affiliation. `outside` means outside collaborators of a project that are not a member of the project's organization. `direct` means collaborators with permissions to a project, regardless of organization membership status. `all` means all collaborators the authenticated user can see.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected int $projectId,
        protected ?string $affiliation = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['affiliation' => $this->affiliation, 'page' => $this->page]);
    }
}
