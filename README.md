## Prerequisites
- PHP >= 8.1
- Composer
- Docker and Docker Compose
- PostgreSQL

## Installation

First, install the dependencies using Composer:

```bash
composer install
```

## Setup databases

Edit credentials in `docker-compose.yml` before running the following command:

```bash
docker-compose up -d
```

## Initialize and configure .env file

Copy the example environment file and modify it as needed:

```bash
cp .env.example .env
```
Then, open `.env` in a text editor and set the required environment variables.

## Generate Application Key

Generate the application key:

```bash
php artisan key:generate
```

## Run migrations and seeders
After setting up the databases and configuring the `.env` file, run the following command to execute migrations and seeders:

```bash
php artisan migrate --seed
```

This will create the necessary database tables and populate them with initial data.

## Documentation

The API documentation is available in the `open-api.yaml` file. You can use an OpenAPI viewer to read it.

## Start the application

You can use the custom setup command defined in `composer.json`:

```bash
composer run setup
```

Or start the application manually:

```bash
php artisan serve
```

## Import datasets

Download datasets StockUniteLegale and StockEtablissementHistorique from https://www.data.gouv.fr/datasets/base-sirene-des-entreprises-et-de-leurs-etablissements-siren-siret and import in your PostgreSQL.
