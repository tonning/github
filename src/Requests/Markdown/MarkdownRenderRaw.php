<?php

namespace Tonning\Github\Requests\Markdown;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * markdown/render-raw
 *
 * You must send Markdown as plain text (using a `Content-Type` header of `text/plain` or
 * `text/x-markdown`) to this endpoint, rather than using JSON format. In raw mode, [GitHub Flavored
 * Markdown](https://github.github.com/gfm/) is not supported and Markdown will be rendered in plain
 * format like a README.md file. Markdown content must be 400 KB or less.
 */
class MarkdownRenderRaw extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/markdown/raw";
	}


	public function __construct()
	{
	}
}
