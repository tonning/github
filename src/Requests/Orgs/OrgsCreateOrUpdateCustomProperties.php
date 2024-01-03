<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/create-or-update-custom-properties
 *
 * Creates new or updates existing custom properties defined for an organization in a batch.
 *
 * To use
 * this endpoint, the authenticated user must be one of:
 *   - An administrator for the organization.
 *   -
 * A user, or a user on a team, with the fine-grained permission of
 * `custom_properties_org_definitions_manager` in the organization.
 *
 * GitHub Apps must have the
 * `organization_custom_properties:admin` organization permission to use this endpoint.
 */
class OrgsCreateOrUpdateCustomProperties extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/properties/schema";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
