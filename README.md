# TO-DO List App

This project is a test task, for APIBEST.  

Technically this is a dummy Laravel project, which is being deployed locally via docker-compose. The idea is to have a single command for the whole infrastructure deployment. 

To achieve this, all of post-deployment commands are moved to init.sh shell script file, and the file is set as an entrypoint.  

In order to handle the database migrations, a simple artisan command was implemented and used, before the migration script itself (check app/Console/Commands/CheckDBConnection).


## Deployment

To deploy the project locally simply run 

`cp .env.example .env`

to copy the environment variables file,

Set the desired DB_PASSWORD on the newly created .env file, then run

`docker compose up -d`
