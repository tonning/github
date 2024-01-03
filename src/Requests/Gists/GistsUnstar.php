<?php

namespace Tonning\Github\Requests\Gists;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gists/unstar
 */
class GistsUnstar extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/gists/{$this->gistId}/star";
	}


	/**
	 * @param string $gistId The unique identifier of the gist.
	 */
	public function __construct(
		protected string $gistId,
	) {
	}
}
