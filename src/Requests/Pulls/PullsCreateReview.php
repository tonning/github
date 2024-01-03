<?php

namespace Tonning\Github\Requests\Pulls;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * pulls/create-review
 *
 * This endpoint triggers
 * [notifications](https://docs.github.com/github/managing-subscriptions-and-notifications-on-github/about-notifications).
 * Creating content too quickly using this endpoint may result in secondary rate limiting. For more
 * information, see "[Rate limits for the
 * API](https://docs.github.com/rest/overview/rate-limits-for-the-rest-api#about-secondary-rate-limits)"
 * and "[Best practices for using the REST
 * API](https://docs.github.com/rest/guides/best-practices-for-using-the-rest-api)."
 *
 * Pull request
 * reviews created in the `PENDING` state are not submitted and therefore do not include the
 * `submitted_at` property in the response. To create a pending review for a pull request, leave the
 * `event` parameter blank. For more information about submitting a `PENDING` review, see "[Submit a
 * review for a pull
 * request](https://docs.github.com/rest/pulls/reviews#submit-a-review-for-a-pull-request)."
 *
 * **Note:**
 * To comment on a specific line in a file, you need to first determine the _position_ of that line in
 * the diff. The GitHub REST API offers the `application/vnd.github.v3.diff` [media
 * type](https://docs.github.com/rest/overview/media-types#commits-commit-comparison-and-pull-requests).
 * To see a pull request diff, add this media type to the `Accept` header of a call to the [single pull
 * request](https://docs.github.com/rest/pulls/pulls#get-a-pull-request) endpoint.
 *
 * The `position`
 * value equals the number of lines down from the first "@@" hunk header in the file you want to add a
 * comment. The line just below the "@@" line is position 1, the next line is position 2, and so on.
 * The position in the diff continues to increase through lines of whitespace and additional hunks
 * until the beginning of a new file.
 */
class PullsCreateReview extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/pulls/{$this->pullNumber}/reviews";
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
