#!/bin/bash

FILE_DIR="$1"
FILE_DIR=${FILE_DIR:=}
FILE_DIR=${FILE_DIR/*tests\/}
PATH_FILE_DIR="./tests/$FILE_DIR"

test -d ./log || mkdir ./log

test -n $(which composer) && composer dump-autoload 1> /dev/null 2>&1

if [ -n "$FILE_DIR" -a -f "$PATH_FILE_DIR" ]
then
  echo -e "Running ./vendor/bin/phpunit "$PATH_FILE_DIR" --testdox\n"
  ./vendor/bin/phpunit "$PATH_FILE_DIR" --testdox
else
  echo -e "Running ./vendor/bin/phpunit --testdox\n"
  ./vendor/bin/phpunit --testdox
fi

# ./run.sh ./tests/ExampleTest.php
# ./run.sh ExampleTest.php

# ./vendor/bin/phpunit [dir_tests] --filter=[MethodName]
# ./vendor/bin/phpunit ./tests --filter=getFullName

# ./vendor/bin/phpunit [dir_tests] --color
# ./vendor/bin/phpunit ./tests --color

# ./vendor/bin/phpunit [dir_tests] --testdox
# ./vendor/bin/phpunit ./tests --testdox

# ./vendor/bin/phpunit [dir_tests] --bootstrap='./vendor/autoload.php'
# ./vendor/bin/phpunit ./tests --bootstrap='./vendor/autoload.php'
