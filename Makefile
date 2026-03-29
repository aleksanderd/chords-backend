COMPOSE     := docker compose
DOCKER_EXEC := ${COMPOSE} exec php-fpm

up:
	${COMPOSE} up -d

down:
	${COMPOSE} down

cli:
	${DOCKER_EXEC} bash

repo-merge:
	${DOCKER_EXEC} vendor/bin/monorepo-builder merge && composer update

cs-fix:
	${DOCKER_EXEC} bash -c "PHP_CS_FIXER_IGNORE_ENV=1 vendor/bin/php-cs-fixer fix --allow-risky=yes"

phpstan:
	${DOCKER_EXEC} vendor/bin/phpstan analyse --memory-limit=1G

deptrac:
	${DOCKER_EXEC} vendor/bin/deptrac

lint: cs-fix phpstan deptrac
