<?php

namespace Tonning\Github\Requests\Gists;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gists/get-comment
 */
class GistsGetComment extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/gists/{$this->gistId}/comments/{$this->commentId}";
	}


	/**
	 * @param string $gistId The unique identifier of the gist.
	 * @param int $commentId The unique identifier of the comment.
	 */
	public function __construct(
		protected string $gistId,
		protected int $commentId,
	) {
	}
}
