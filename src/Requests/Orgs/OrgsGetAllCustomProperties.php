<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/get-all-custom-properties
 *
 * Gets all custom properties defined for an organization.
 * Organization members can read these
 * properties.
 *
 * GitHub Apps must have the `organization_custom_properties:read` organization permission
 * to use this endpoint.
 */
class OrgsGetAllCustomProperties extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/properties/schema";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $org,
	) {
	}
}
