<?php

namespace Tonning\Github\Requests\Meta;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * meta/get-all-versions
 *
 * Get all supported GitHub API versions.
 */
class MetaGetAllVersions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/versions";
	}


	public function __construct()
	{
	}
}
