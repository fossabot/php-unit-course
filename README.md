# PHP Unit Course

[![Build Status](https://badgen.net/travis/julio-cesar-development/php-unit-course?icon=travis)](https://travis-ci.org/julio-cesar-development/php-unit-course)
![Language](https://badgen.net/badge/language/php/blue)
![License](https://badgen.net/badge/license/MIT/blue)
[![GitHub Status](https://badgen.net/github/status/julio-cesar-development/php-unit-course)](https://github.com/julio-cesar-development/php-unit-course)
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fjulio-cesar-development%2Fphp-unit-course.svg?type=shield)](https://app.fossa.io/projects/git%2Bgithub.com%2Fjulio-cesar-development%2Fphp-unit-course?ref=badge_shield)

> This repository contains codes made with PHP Unit, only for learning purposes

## Running

> These tests can be executed with docker-compose:

```bash
docker-compose up test
```

> Or just docker:

```bash
docker image build -f Dockerfile -t php-unit-test .
docker container run --name php-unit-test php-unit-test
```

> Or even directly with php-unit through command line, it is required *composer*

```bash
composer install
./vendor/bin/phpunit --testdox
```

## Authors

* **Julio Cesar** - *Initial work*

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details


[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fjulio-cesar-development%2Fphp-unit-course.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2Fjulio-cesar-development%2Fphp-unit-course?ref=badge_large)