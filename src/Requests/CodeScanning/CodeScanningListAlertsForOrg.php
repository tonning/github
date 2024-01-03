<?php

namespace Tonning\Github\Requests\CodeScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/list-alerts-for-org
 *
 * Lists code scanning alerts for the default branch for all eligible repositories in an organization.
 * Eligible repositories are repositories that are owned by organizations that you own or for which you
 * are a security manager. For more information, see "[Managing security managers in your
 * organization](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/managing-security-managers-in-your-organization)."
 *
 * To
 * use this endpoint, you must be an owner or security manager for the organization, and you must use
 * an access token with the `repo` scope or `security_events` scope.
 *
 * For public repositories, you may
 * instead use the `public_repo` scope.
 */
class CodeScanningListAlertsForOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/code-scanning/alerts";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  null|string  $toolName The name of a code scanning tool. Only results by this tool will be listed. You can specify the tool by using either `tool_name` or `tool_guid`, but not both.
     * @param  null|string  $toolGuid The GUID of a code scanning tool. Only results by this tool will be listed. Note that some code scanning tools may not include a GUID in their analysis data. You can specify the tool by using either `tool_guid` or `tool_name`, but not both.
     * @param  null|string  $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
     * @param  null|int  $page Page number of the results to fetch.
     * @param  null|string  $direction The direction to sort the results by.
     * @param  null|string  $state If specified, only code scanning alerts with this state will be returned.
     * @param  null|string  $sort The property by which to sort the results.
     * @param  null|string  $severity If specified, only code scanning alerts with this severity will be returned.
     */
    public function __construct(
        protected string $org,
        protected ?string $toolName = null,
        protected ?string $toolGuid = null,
        protected ?string $before = null,
        protected ?int $page = null,
        protected ?string $direction = null,
        protected ?string $state = null,
        protected ?string $sort = null,
        protected ?string $severity = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'tool_name' => $this->toolName,
            'tool_guid' => $this->toolGuid,
            'before' => $this->before,
            'page' => $this->page,
            'direction' => $this->direction,
            'state' => $this->state,
            'sort' => $this->sort,
            'severity' => $this->severity,
        ]);
    }
}
