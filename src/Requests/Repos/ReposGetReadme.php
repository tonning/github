<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-readme
 *
 * Gets the preferred README for a repository.
 *
 * READMEs support [custom media
 * types](https://docs.github.com/rest/overview/media-types) for retrieving the raw content or rendered
 * HTML.
 */
class ReposGetReadme extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/readme";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param null|string $ref The name of the commit/branch/tag. Default: the repository’s default branch.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected ?string $ref = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['ref' => $this->ref]);
	}
}
