<?php

namespace Tonning\Github\Requests\Pulls;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * pulls/create-review-comment
 *
 *
 * Creates a review comment in the pull request diff. To add a regular comment to a pull request
 * timeline, see "[Create an issue
 * comment](https://docs.github.com/rest/issues/comments#create-an-issue-comment)." We recommend
 * creating a review comment using `line`, `side`, and optionally `start_line` and `start_side` if your
 * comment applies to more than one line in the pull request diff.
 *
 * The `position` parameter is
 * deprecated. If you use `position`, the `line`, `side`, `start_line`, and `start_side` parameters are
 * not required.
 *
 * **Note:** The position value equals the number of lines down from the first "@@" hunk
 * header in the file you want to add a comment. The line just below the "@@" line is position 1, the
 * next line is position 2, and so on. The position in the diff continues to increase through lines of
 * whitespace and additional hunks until the beginning of a new file.
 *
 * This endpoint triggers
 * [notifications](https://docs.github.com/github/managing-subscriptions-and-notifications-on-github/about-notifications).
 * Creating content too quickly using this endpoint may result in secondary rate limiting. For more
 * information, see "[Rate limits for the
 * API](https://docs.github.com/rest/overview/rate-limits-for-the-rest-api#about-secondary-rate-limits)"
 * and
 * "[Best practices for using the REST
 * API](https://docs.github.com/rest/guides/best-practices-for-using-the-rest-api)."
 */
class PullsCreateReviewComment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/pulls/{$this->pullNumber}/comments";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $pullNumber The number that identifies the pull request.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $pullNumber,
    ) {
    }
}
