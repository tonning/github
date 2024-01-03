<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/remove-custom-property
 *
 * Removes a custom property that is defined for an organization.
 *
 * To use this endpoint, the
 * authenticated user must be one of:
 *   - An administrator for the organization.
 *   - A user, or a user
 * on a team, with the fine-grained permission of `custom_properties_org_definitions_manager` in the
 * organization.
 *
 * GitHub Apps must have the `organization_custom_properties:admin` organization
 * permission to use this endpoint.
 */
class OrgsRemoveCustomProperty extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/properties/schema/{$this->customPropertyName}";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $customPropertyName The custom property name. The name is case-sensitive.
	 */
	public function __construct(
		protected string $org,
		protected string $customPropertyName,
	) {
	}
}
