<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-workflow-runs
 *
 * List all workflow runs for a workflow. You can replace `workflow_id` with the workflow file name.
 * For example, you could use `main.yaml`. You can use parameters to narrow the list of results. For
 * more information about using parameters, see
 * [Parameters](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#parameters).
 *
 * Anyone
 * with read access to the repository can use this endpoint. If the repository is private you must use
 * an access token with the `repo` scope.
 */
class ActionsListWorkflowRuns extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/workflows/{$this->workflowId}/runs";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  mixed  $workflowId The ID of the workflow. You can also pass the workflow file name as a string.
     * @param  null|string  $actor Returns someone's workflow runs. Use the login for the user who created the `push` associated with the check suite or workflow run.
     * @param  null|string  $branch Returns workflow runs associated with a branch. Use the name of the branch of the `push`.
     * @param  null|string  $event Returns workflow run triggered by the event you specify. For example, `push`, `pull_request` or `issue`. For more information, see "[Events that trigger workflows](https://docs.github.com/actions/automating-your-workflow-with-github-actions/events-that-trigger-workflows)."
     * @param  null|string  $status Returns workflow runs with the check run `status` or `conclusion` that you specify. For example, a conclusion can be `success` or a status can be `in_progress`. Only GitHub can set a status of `waiting` or `requested`.
     * @param  null|int  $page Page number of the results to fetch.
     * @param  null|string  $created Returns workflow runs created within the given date-time range. For more information on the syntax, see "[Understanding the search syntax](https://docs.github.com/search-github/getting-started-with-searching-on-github/understanding-the-search-syntax#query-for-dates)."
     * @param  null|bool  $excludePullRequests If `true` pull requests are omitted from the response (empty array).
     * @param  null|int  $checkSuiteId Returns workflow runs with the `check_suite_id` that you specify.
     * @param  null|string  $headSha Only returns workflow runs that are associated with the specified `head_sha`.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected mixed $workflowId,
        protected ?string $actor = null,
        protected ?string $branch = null,
        protected ?string $event = null,
        protected ?string $status = null,
        protected ?int $page = null,
        protected ?string $created = null,
        protected ?bool $excludePullRequests = null,
        protected ?int $checkSuiteId = null,
        protected ?string $headSha = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'actor' => $this->actor,
            'branch' => $this->branch,
            'event' => $this->event,
            'status' => $this->status,
            'page' => $this->page,
            'created' => $this->created,
            'exclude_pull_requests' => $this->excludePullRequests,
            'check_suite_id' => $this->checkSuiteId,
            'head_sha' => $this->headSha,
        ]);
    }
}
