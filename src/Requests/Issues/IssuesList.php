<?php

namespace Tonning\Github\Requests\Issues;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * issues/list
 *
 * List issues assigned to the authenticated user across all visible repositories including owned
 * repositories, member
 * repositories, and organization repositories. You can use the `filter` query
 * parameter to fetch issues that are not
 * necessarily assigned to you.
 *
 *
 * **Note**: GitHub's REST API
 * considers every pull request an issue, but not every issue is a pull request. For this
 * reason,
 * "Issues" endpoints may return both issues and pull requests in the response. You can identify pull
 * requests by
 * the `pull_request` key. Be aware that the `id` of a pull request returned from "Issues"
 * endpoints will be an _issue id_. To find out the pull
 * request id, use the "[List pull
 * requests](https://docs.github.com/rest/pulls/pulls#list-pull-requests)" endpoint.
 */
class IssuesList extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/issues';
    }

    /**
     * @param  null|string  $filter Indicates which sorts of issues to return. `assigned` means issues assigned to you. `created` means issues created by you. `mentioned` means issues mentioning you. `subscribed` means issues you're subscribed to updates for. `all` or `repos` means all issues you can see, regardless of participation or creation.
     * @param  null|string  $state Indicates the state of the issues to return.
     * @param  null|string  $labels A list of comma separated label names. Example: `bug,ui,@high`
     * @param  null|string  $sort What to sort results by.
     * @param  null|string  $direction The direction to sort the results by.
     * @param  null|string  $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected ?string $filter = null,
        protected ?string $state = null,
        protected ?string $labels = null,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?string $since = null,
        protected ?bool $collab = null,
        protected ?bool $orgs = null,
        protected ?bool $owned = null,
        protected ?bool $pulls = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'filter' => $this->filter,
            'state' => $this->state,
            'labels' => $this->labels,
            'sort' => $this->sort,
            'direction' => $this->direction,
            'since' => $this->since,
            'collab' => $this->collab,
            'orgs' => $this->orgs,
            'owned' => $this->owned,
            'pulls' => $this->pulls,
            'page' => $this->page,
        ]);
    }
}
