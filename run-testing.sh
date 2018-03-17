#!/bin/bash
function run_testing {
	docker run -t -v ${PWD}:/app  --rm -w /app php ./vendor/bin/phpunit
}

run_testing
