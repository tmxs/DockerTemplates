# Minimal PHP & MySQL Docker Environment

## Usage

Run `docker-compose up -d --build`

Open http://127.0.0.1/check.php  or http://127.0.0.1/info.php

To access the MySQL-Console just type `docker-compose exec db mysql -u dev -p` (Then 'dev' for the password).

In the Console you can list the available databases with the command: `show databases;` (should be project for your Project).
