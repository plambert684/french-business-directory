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

Before creating the databases with docker, create a 'data_to_import' folder in the project root to store datasets to import:

```bashm
mkdir data_to_import
```

Put StockUniteLegale and StockEtablissementHistorique **csv** datasets from https://www.data.gouv.fr/datasets/base-sirene-des-entreprises-et-de-leurs-etablissements-siren-siret in the 'data_to_import' folder.

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

## Import datasets

Opening a psql session and executing the following commands to import the datasets into the PostgreSQL database:

```bash
COPY etablissements_historique (
    siren,
    nic,
    siret,
    date_fin,
    date_debut,
    etat_administratif_etablissement,
    changement_etat_administratif_etablissement,
    enseigne_1_etablissement,
    enseigne_2_etablissement,
    enseigne_3_etablissement,
    changement_enseigne_etablissement,
    denomination_usuelle_etablissement,
    changement_denomination_usuelle_etablissement,
    activite_principale_etablissement,
    nomenclature_activite_principale_etablissement,
    changement_activite_principale_etablissement,
    caractere_employeur_etablissement,
    changement_caractere_employeur_etablissement
)
FROM '/container_data/StockEtablissementHistorique_utf8.csv'
WITH (FORMAT CSV, HEADER TRUE, DELIMITER ',');

COPY unites_legales (
    siren,
    statut_diffusion_unite_legale,
    unite_purgee_unite_legale,
    date_creation_unite_legale,
    sigle_unite_legale,
    sexe_unite_legale,
    prenom_1_unite_legale,
    prenom_2_unite_legale,
    prenom_3_unite_legale,
    prenom_4_unite_legale,
    prenom_usuel_unite_legale,
    pseudonyme_unite_legale,
    identifiant_association_unite_legale,
    tranche_effectifs_unite_legale,
    annee_effectifs_unite_legale,
    date_dernier_traitement_unite_legale,
    nombre_periodes_unite_legale,
    categorie_entreprise,
    annee_categorie_entreprise,
    date_debut,
    etat_administratif_unite_legale,
    nom_unite_legale,
    nom_usage_unite_legale,
    denomination_unite_legale,
    denomination_usuelle_1_unite_legale,
    denomination_usuelle_2_unite_legale,
    denomination_usuelle_3_unite_legale,
    categorie_juridique_unite_legale,
    activite_principale_unite_legale,
    nomenclature_activite_principale_unite_legale,
    nic_siege_unite_legale,
    economie_sociale_solidaire_unite_legale,
    societe_mission_unite_legale,
    caractere_employeur_unite_legale,
    activite_principale_naf_25_unite_legale
)
FROM '/container_data/StockUniteLegale_utf8.csv'
WITH (FORMAT CSV, HEADER TRUE, DELIMITER ',');
```

This operation may take some time depending on the size of the datasets.

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
