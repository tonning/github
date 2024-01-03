<?php

namespace Tonning\Github\Requests\Pulls;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * pulls/get-review
 *
 * Retrieves a pull request review by its ID.
 */
class PullsGetReview extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/pulls/{$this->pullNumber}/reviews/{$this->reviewId}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $pullNumber The number that identifies the pull request.
     * @param  int  $reviewId The unique identifier of the review.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $pullNumber,
        protected int $reviewId,
    ) {
    }
}
