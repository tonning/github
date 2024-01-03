<?php

namespace Tonning\Github\Requests\Pulls;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * pulls/submit-review
 *
 * Submits a pending review for a pull request. For more information about creating a pending review
 * for a pull request, see "[Create a review for a pull
 * request](https://docs.github.com/rest/pulls/reviews#create-a-review-for-a-pull-request)."
 */
class PullsSubmitReview extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/pulls/{$this->pullNumber}/reviews/{$this->reviewId}/events";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $pullNumber The number that identifies the pull request.
	 * @param int $reviewId The unique identifier of the review.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $pullNumber,
		protected int $reviewId,
	) {
	}
}
