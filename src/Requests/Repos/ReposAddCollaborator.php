<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/add-collaborator
 *
 * This endpoint triggers
 * [notifications](https://docs.github.com/github/managing-subscriptions-and-notifications-on-github/about-notifications).
 * Creating content too quickly using this endpoint may result in secondary rate limiting. For more
 * information, see "[Rate limits for the
 * API](https://docs.github.com/rest/overview/rate-limits-for-the-rest-api#about-secondary-rate-limits)"
 * and "[Best practices for using the REST
 * API](https://docs.github.com/rest/guides/best-practices-for-using-the-rest-api)."
 *
 * Adding an outside
 * collaborator may be restricted by enterprise administrators. For more information, see "[Enforcing
 * repository management policies in your
 * enterprise](https://docs.github.com/admin/policies/enforcing-policies-for-your-enterprise/enforcing-repository-management-policies-in-your-enterprise#enforcing-a-policy-for-inviting-outside-collaborators-to-repositories)."
 *
 * For
 * more information on permission levels, see "[Repository permission levels for an
 * organization](https://docs.github.com/github/setting-up-and-managing-organizations-and-teams/repository-permission-levels-for-an-organization#permission-levels-for-repositories-owned-by-an-organization)".
 * There are restrictions on which permissions can be granted to organization members when an
 * organization base role is in place. In this case, the permission being given must be equal to or
 * higher than the org base permission. Otherwise, the request will fail with:
 *
 * ```
 * Cannot assign
 * {member} permission of {role name}
 * ```
 *
 * Note that, if you choose not to pass any parameters, you'll
 * need to set `Content-Length` to zero when calling out to this endpoint. For more information, see
 * "[HTTP
 * method](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#http-method)."
 *
 * The
 * invitee will receive a notification that they have been invited to the repository, which they must
 * accept or decline. They may do this via the notifications page, the email they receive, or by using
 * the [API](https://docs.github.com/rest/collaborators/invitations).
 *
 * **Updating an existing
 * collaborator's permission level**
 *
 * The endpoint can also be used to change the permissions of an
 * existing collaborator without first removing and re-adding the collaborator. To change the
 * permissions, use the same endpoint and pass a different `permission` parameter. The response will be
 * a `204`, with no other indication that the permission level changed.
 *
 * **Rate limits**
 *
 * You are
 * limited to sending 50 invitations to a repository per 24 hour period. Note there is no limit if you
 * are inviting organization members to an organization repository.
 */
class ReposAddCollaborator extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/collaborators/{$this->username}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected string $username,
	) {
	}
}
