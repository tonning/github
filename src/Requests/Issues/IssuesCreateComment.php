<?php

namespace Tonning\Github\Requests\Issues;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * issues/create-comment
 *
 *
 * You can use the REST API to create comments on issues and pull requests. Every pull request is an
 * issue, but not every issue is a pull request.
 *
 * This endpoint triggers
 * [notifications](https://docs.github.com/github/managing-subscriptions-and-notifications-on-github/about-notifications).
 * Creating
 * content too quickly using this endpoint may result in secondary rate limiting.
 * For more information,
 * see "[Rate limits for the
 * API](https://docs.github.com/rest/overview/rate-limits-for-the-rest-api#about-secondary-rate-limits)"
 * and
 * "[Best practices for using the REST
 * API](https://docs.github.com/rest/guides/best-practices-for-using-the-rest-api)."
 */
class IssuesCreateComment extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/issues/{$this->issueNumber}/comments";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $issueNumber The number that identifies the issue.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $issueNumber,
	) {
	}
}
