<?php

namespace Tonning\Github\Requests\Git;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * git/get-blob
 *
 * The `content` in the response will always be Base64 encoded.
 *
 * _Note_: This API supports blobs up to
 * 100 megabytes in size.
 */
class GitGetBlob extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/git/blobs/{$this->fileSha}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $fileSha
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected string $fileSha,
	) {
	}
}
