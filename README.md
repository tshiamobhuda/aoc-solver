# Advent of Code PHP solver

A small simple implementation (and experiment) of hexagonal/port & adapters architecture using PHP

## Getting started

This assumes that you have the following:

- git
- Docker (with compose)

### Setup

1. Clone repo: `git clone https://github.com/tshiamobhuda/aoc-php-solver.git`
2. Install dependencies: `./start.sh`

You might need a `chmod +x ./start.sh` if you don't have permissions to run the script. The script uses docker compose to bring up a `aoc-solver` container (with a bash shell open in TTY mode).

### Usage

The purpose of this project is to help lessen the pain of setting up a dev environment to solve Advent of Code challenges using PHP... (it should allow you to generate solutions for any day or yearday[i.e `Day1.php` or `Day202301.php`])

#### Generate boilerplate Solution files

To generate a boilerplate solution file for the day you want to solve, run the below command in the docker container shell. Provide a numeric value when answering the _"What is the day?"_ question

```bash
./bin/generate
```

Two `.txt` files `day.<dayNumber>.test.txt`, `day.<dayNumber>.txt` and a `Day<dayNumber>.php` file will be created in `src/Resource/Input` and `src/Resources/Solution` respectively.

- You can copy+paste you test & final puzzle input into the `.txt` files.
- The `Day<dayNumber>.php` file should be used to add logic to solve the two parts of each Advent of code challenge.

#### Test Solution

To test a solution file for the day you want to solve, run the following command in the docker container shell.

```bash
./app <dayNumber> [<part>] -d 
```

Where `<dayNumber>` is the Advent of code day, `<part>` is the Advent of code puzzle part (defaults to `a`, other option is `b`), and `-d` is an optional flag used to run solution against test input.

The same command can be used without the `-d` flag to run the solution against _'final'_ puzzle input.

#### Misc

Run `./bin/generate -h` or `./app -h` to bring up the help page for each command.
