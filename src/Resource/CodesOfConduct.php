<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\CodesOfConduct\CodesOfConductGetAllCodesOfConduct;
use Tonning\Github\Requests\CodesOfConduct\CodesOfConductGetConductCode;
use Tonning\Github\Resource;

class CodesOfConduct extends Resource
{
	public function codesOfConductGetAllCodesOfConduct(): Response
	{
		return $this->connector->send(new CodesOfConductGetAllCodesOfConduct());
	}


	/**
	 * @param string $key
	 */
	public function codesOfConductGetConductCode(string $key): Response
	{
		return $this->connector->send(new CodesOfConductGetConductCode($key));
	}
}
