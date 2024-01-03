<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * projects/create-for-org
 *
 * Creates an organization project board. Returns a `410 Gone` status if projects are disabled in the
 * organization or if the organization does not have existing classic projects. If you do not have
 * sufficient privileges to perform this action, a `401 Unauthorized` or `410 Gone` status is returned.
 */
class ProjectsCreateForOrg extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/projects";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
