<?php

namespace App\Helpers;

use Illuminate\Http\Response;

class ResponseBuilder {

	private int $status = Response::HTTP_OK;

	private array|object $data = [];

	public function status(int $status): ResponseBuilder {
		$this->status = $status;
		return $this;
	}

	public function data(array|object $data): ResponseBuilder {
		$this->data = $data;
		return $this;
	}

	public function set(string $key, mixed $value): ResponseBuilder {
		$this->data[$key] = $value;
		return $this;
	}

	public function error(string $code, mixed $details = null) {
		$this->set('code', $code);
		if (!is_null($details)) {
			$this->set('details', $details);
		}
		return $this;
	}

	public function build() {
		return response()
			->json($this->data, $this->status);
	}

	public static function create(): ResponseBuilder {
		return new ResponseBuilder;
	}

}