<?php

namespace Tonning\Github\Requests\Issues;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * issues/get
 *
 * The API returns a [`301 Moved Permanently`
 * status](https://docs.github.com/rest/guides/best-practices-for-using-the-rest-api#follow-redirects)
 * if the issue
 * was
 * [transferred](https://docs.github.com/articles/transferring-an-issue-to-another-repository/) to
 * another repository. If
 * the issue was transferred to or deleted from a repository where the
 * authenticated user lacks read access, the API
 * returns a `404 Not Found` status. If the issue was
 * deleted from a repository where the authenticated user has read
 * access, the API returns a `410 Gone`
 * status. To receive webhook events for transferred and deleted issues, subscribe
 * to the
 * [`issues`](https://docs.github.com/webhooks/event-payloads/#issues) webhook.
 *
 * **Note**: GitHub's
 * REST API considers every pull request an issue, but not every issue is a pull request. For
 * this
 * reason, "Issues" endpoints may return both issues and pull requests in the response. You can
 * identify pull requests by
 * the `pull_request` key. Be aware that the `id` of a pull request returned
 * from "Issues" endpoints will be an _issue id_. To find out the pull
 * request id, use the "[List pull
 * requests](https://docs.github.com/rest/pulls/pulls#list-pull-requests)" endpoint.
 */
class IssuesGet extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/issues/{$this->issueNumber}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $issueNumber The number that identifies the issue.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $issueNumber,
    ) {
    }
}
