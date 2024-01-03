<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/get-custom-property
 *
 * Gets a custom property that is defined for an organization.
 * Organization members can read these
 * properties.
 *
 * GitHub Apps must have the `organization_custom_properties:read` organization permission
 * to use this endpoint.
 */
class OrgsGetCustomProperty extends Request
{
	protected Method $method = Method::GET;


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
