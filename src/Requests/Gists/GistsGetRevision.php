<?php

namespace Tonning\Github\Requests\Gists;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gists/get-revision
 */
class GistsGetRevision extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/gists/{$this->gistId}/{$this->sha}";
	}


	/**
	 * @param string $gistId The unique identifier of the gist.
	 * @param string $sha
	 */
	public function __construct(
		protected string $gistId,
		protected string $sha,
	) {
	}
}
