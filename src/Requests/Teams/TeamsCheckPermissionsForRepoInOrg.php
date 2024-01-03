<?php

namespace Tonning\Github\Requests\Teams;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/check-permissions-for-repo-in-org
 *
 * Checks whether a team has `admin`, `push`, `maintain`, `triage`, or `pull` permission for a
 * repository. Repositories inherited through a parent team will also be checked.
 *
 * You can also get
 * information about the specified repository, including what permissions the team grants on it, by
 * passing the following custom [media type](https://docs.github.com/rest/overview/media-types/) via
 * the `application/vnd.github.v3.repository+json` accept header.
 *
 * If a team doesn't have permission
 * for the repository, you will receive a `404 Not Found` response status.
 *
 * If the repository is
 * private, you must have at least `read` permission for that repository, and your token must have the
 * `repo` or `admin:org` scope. Otherwise, you will receive a `404 Not Found` response
 * status.
 *
 * **Note:** You can also specify a team by `org_id` and `team_id` using the route `GET
 * /organizations/{org_id}/team/{team_id}/repos/{owner}/{repo}`.
 */
class TeamsCheckPermissionsForRepoInOrg extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/teams/{$this->teamSlug}/repos/{$this->owner}/{$this->repo}";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $org,
		protected string $teamSlug,
		protected string $owner,
		protected string $repo,
	) {
	}
}
