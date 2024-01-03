<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * projects/update
 *
 * Updates a project board's information. Returns a `404 Not Found` status if projects are disabled. If
 * you do not have sufficient privileges to perform this action, a `401 Unauthorized` or `410 Gone`
 * status is returned.
 */
class ProjectsUpdate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/projects/{$this->projectId}";
    }

    /**
     * @param  int  $projectId The unique identifier of the project.
     */
    public function __construct(
        protected int $projectId,
    ) {
    }
}
