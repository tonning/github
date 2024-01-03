<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/upload-release-asset
 *
 * This endpoint makes use of a [Hypermedia
 * relation](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#hypermedia)
 * to determine which URL to access. The endpoint you call to upload release assets is specific to your
 * release. Use the `upload_url` returned in
 * the response of the [Create a release
 * endpoint](https://docs.github.com/rest/releases/releases#create-a-release) to upload a release
 * asset.
 *
 * You need to use an HTTP client which supports
 * [SNI](http://en.wikipedia.org/wiki/Server_Name_Indication) to make calls to this endpoint.
 *
 * Most
 * libraries will set the required `Content-Length` header automatically. Use the required
 * `Content-Type` header to provide the media type of the asset. For a list of media types, see [Media
 * Types](https://www.iana.org/assignments/media-types/media-types.xhtml). For example:
 *
 *
 * `application/zip`
 *
 * GitHub expects the asset data in its raw binary form, rather than JSON. You
 * will send the raw binary content of the asset as the request body. Everything else about the
 * endpoint is the same as the rest of the API. For example,
 * you'll still need to pass your
 * authentication to be able to upload an asset.
 *
 * When an upstream failure occurs, you will receive a
 * `502 Bad Gateway` status. This may leave an empty asset with a state of `starter`. It can be safely
 * deleted.
 *
 * **Notes:**
 * *   GitHub renames asset filenames that have special characters,
 * non-alphanumeric characters, and leading or trailing periods. The "[List release
 * assets](https://docs.github.com/rest/releases/assets#list-release-assets)"
 * endpoint lists the
 * renamed filenames. For more information and help, contact [GitHub
 * Support](https://support.github.com/contact?tags=dotcom-rest-api).
 * *   To find the `release_id`
 * query the [`GET /repos/{owner}/{repo}/releases/latest`
 * endpoint](https://docs.github.com/rest/releases/releases#get-the-latest-release).
 * *   If you upload
 * an asset with the same filename as another uploaded asset, you'll receive an error and must delete
 * the old file before you can re-upload the new asset.
 */
class ReposUploadReleaseAsset extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/releases/{$this->releaseId}/assets";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $releaseId The unique identifier of the release.
	 * @param string $name
	 * @param null|string $label
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $releaseId,
		protected string $name,
		protected ?string $label = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['name' => $this->name, 'label' => $this->label]);
	}
}
