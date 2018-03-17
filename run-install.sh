#!/bin/bash
function run_install {
	docker run -t --rm -v ${PWD}:/app composer composer install --no-scripts --ignore-platform-reqs
}

run_install