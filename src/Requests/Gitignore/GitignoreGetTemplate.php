<?php

namespace Tonning\Github\Requests\Gitignore;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gitignore/get-template
 *
 * The API also allows fetching the source of a single template.
 * Use the raw [media
 * type](https://docs.github.com/rest/overview/media-types/) to get the raw contents.
 */
class GitignoreGetTemplate extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/gitignore/templates/{$this->name}";
	}


	/**
	 * @param string $name
	 */
	public function __construct(
		protected string $name,
	) {
	}
}
