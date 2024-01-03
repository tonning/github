<?php

namespace Tonning\Github\Requests\Pulls;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * pulls/update-review-comment
 *
 * Enables you to edit a review comment.
 */
class PullsUpdateReviewComment extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/pulls/comments/{$this->commentId}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $commentId The unique identifier of the comment.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $commentId,
	) {
	}
}
