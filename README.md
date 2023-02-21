# Welcome to File-Exploder!

The File explorer application has the following features
- Display all files and folders in the current folder
- Store a new file or create a folder
- Filter the entire view by folder

# Installation

The following steps are recommended in order to run app on local env

**Clone the repositrory**

    git clone naumce   

**Copy .env file**

    cp .env.example env

**Change hosts file**

    127.0.0.1 file-explorer.local

## Docker

**Build docker images**

    dokcer compose up --build
    docker exec -it file_explorer_app /bin/bash

**Container CLI**

    composer install

**Images**


## Warm-up the application

Generation of files and folders can be completed using Artisan command

    php artisan file-explorer:install

The above command will show the following prompt

**Example**: Seeding database with the following
- 1 root folder
- 5000 nested folders
- 1 000 000 files

Console prompts ->

    Please enter the number of root folder: 1
    Please enter the number of folder: 5000
    Please enter the number of files: 1000000
    Do you want to proceed? (yes/no): yes

The above command will populate the database and will generate files in a filesystem on the following location

    storage/app/public/tmp/faker0k2Njw.log

## Seed the application

**Create Root Folder** - create root folder

    php artisan db:seed --class='FolderSeeder'

**Create folder** - create folder

    php artisan db:seed --class='FolderSeeder'

**Create file** - create file

    php artisan db:seed --class='FileSeeder'

## UI

On the following route the is a list of generated folders
http://file-explorer.local:39001/

## Unit Test

    php artisan test
The above command will execute the following tests

**Unit Tests**

- test_it_can_create_a_root_folder
- test_it_can_create_a_folder
- test_it_can_create_a_file

**Integration Tests**
- test_if_file_exists_on_file_system
- test_if_file_has_content
- test_if_folder_has_files_in_db_and_in_file_system

## App screenshots
