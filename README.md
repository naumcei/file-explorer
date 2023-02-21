# Welcome to File-Exploder!

The **File Explorer** application has the following features
- Display all files and folders in the current folder
- Store a new file or create a folder
- Filter the entire view by folder

One of the benefits of using a flat filesystem is that it can improve the speed of file **search and retrieval**. Since there are no **subdirectories**, the file system doesn't need to **traverse** multiple levels of directories to find the required file.

This can **reduce** the time it takes to access files and improve application performance, particularly when working with large numbers of files.


# Installation

The following steps are recommended in order to run app on local env

**Clone the repositrory**

    git clone https://github.com/naumcei/file-explorer

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


![enter image description here](https://raw.githubusercontent.com/naumcei/file-explorer/master/storage/screenshoots/docker.png)


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

## Store a new file or create a folder

**Create Root Folder** - create root folder

    php artisan db:seed --class='FolderSeeder'

**Create folder** - create folder

    php artisan db:seed --class='FolderSeeder'

**Create file** - create file

    php artisan db:seed --class='FileSeeder'

## Display files and folders

On the following route the is a list of generated folders
http://file-explorer.local:39001/

**Display Directory structure**

- There is an action preview that present the folder structure

![enter image description here](https://raw.githubusercontent.com/naumcei/file-explorer/master/storage/screenshoots/ui_1.png)

**Display all files and folders in the current folder**

![enter image description here](https://raw.githubusercontent.com/naumcei/file-explorer/master/storage/screenshoots/ui_2.png)

**Filter the entire view by folder**
![enter image description here](https://raw.githubusercontent.com/naumcei/file-explorer/master/storage/screenshoots/ui_3.png)



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

**Unit test screenshoot**
![enter image description here](https://raw.githubusercontent.com/naumcei/file-explorer/master/storage/screenshoots/unit_test.png)

## Database
Database is storing the metadata for each file and folder, including the folder name, file name, the directory it **belongs to**, and the path to the file on the filesystem

**Note:**
The index can be created to speed up the search by filename
`ALTER TABLE folders ADD INDEX name_idx (name);`

![enter image description here](https://raw.githubusercontent.com/naumcei/file-explorer/master/storage/screenshoots/db.png)

## Filesystem

All files that are generated are stored in the following location

    storage/app/public/tmp/

This approach allows you to take advantage of the benefits of a flat filesystem, such as faster file search and retrieval, while still being able to maintain a logical directory structure for the files and folders thanks to the metadata that is stored to database

## Tech stack

- Laravel Version: 10.0.3
- PHP Version: 8.23
- Composer Version: 2.5.4

Made with ❤️ 

