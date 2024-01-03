<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-using-template
 *
 * Creates a new repository using a repository template. Use the `template_owner` and `template_repo`
 * route parameters to specify the repository to use as the template. If the repository is not public,
 * the authenticated user must own or be a member of an organization that owns the repository. To check
 * if a repository is available to use as a template, get the repository's information using the [Get a
 * repository](https://docs.github.com/rest/repos/repos#get-a-repository) endpoint and check that the
 * `is_template` key is `true`.
 *
 * **OAuth scope requirements**
 *
 * When using
 * [OAuth](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/),
 * authorizations must include:
 *
 * *   `public_repo` scope or `repo` scope to create a public
 * repository
 * *   `repo` scope to create a private repository
 */
class ReposCreateUsingTemplate extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->templateOwner}/{$this->templateRepo}/generate";
	}


	/**
	 * @param string $templateOwner The account owner of the template repository. The name is not case-sensitive.
	 * @param string $templateRepo The name of the template repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $templateOwner,
		protected string $templateRepo,
	) {
	}
}
