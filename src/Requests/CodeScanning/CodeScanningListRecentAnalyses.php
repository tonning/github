<?php

namespace Tonning\Github\Requests\CodeScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/list-recent-analyses
 *
 * Lists the details of all code scanning analyses for a repository,
 * starting with the most recent.
 * The
 * response is paginated and you can use the `page` and `per_page` parameters
 * to list the analyses
 * you're interested in.
 * By default 30 analyses are listed per page.
 *
 * The `rules_count` field in the
 * response give the number of rules
 * that were run in the analysis.
 * For very old analyses this data is
 * not available,
 * and `0` is returned in this field.
 *
 * You must use an access token with the
 * `security_events` scope to use this endpoint with private repositories,
 * the `public_repo` scope also
 * grants permission to read security events on public repositories only.
 *
 * **Deprecation notice**:
 * The
 * `tool_name` field is deprecated and will, in future, not be included in the response for this
 * endpoint. The example response reflects this change. The tool name can now be found inside the
 * `tool` field.
 */
class CodeScanningListRecentAnalyses extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/analyses";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  null|string  $toolName The name of a code scanning tool. Only results by this tool will be listed. You can specify the tool by using either `tool_name` or `tool_guid`, but not both.
     * @param  null|string  $toolGuid The GUID of a code scanning tool. Only results by this tool will be listed. Note that some code scanning tools may not include a GUID in their analysis data. You can specify the tool by using either `tool_guid` or `tool_name`, but not both.
     * @param  null|int  $page Page number of the results to fetch.
     * @param  null|string  $ref The Git reference for the analyses you want to list. The `ref` for a branch can be formatted either as `refs/heads/<branch name>` or simply `<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     * @param  null|string  $sarifId Filter analyses belonging to the same SARIF upload.
     * @param  null|string  $direction The direction to sort the results by.
     * @param  null|string  $sort The property by which to sort the results.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $toolName = null,
        protected ?string $toolGuid = null,
        protected ?int $page = null,
        protected ?string $ref = null,
        protected ?string $sarifId = null,
        protected ?string $direction = null,
        protected ?string $sort = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'tool_name' => $this->toolName,
            'tool_guid' => $this->toolGuid,
            'page' => $this->page,
            'ref' => $this->ref,
            'sarif_id' => $this->sarifId,
            'direction' => $this->direction,
            'sort' => $this->sort,
        ]);
    }
}
