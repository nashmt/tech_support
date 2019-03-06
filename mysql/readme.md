
## Files

- `run_container.sh`

  This shell script:

    1. Builds the mysql container
    2. Runs the container
    3. Creates a mysql user
    4. Creates and loads the database
    5. Runs a command to print the database contents

## Directories

### mysql

This directory contains the files necessary to build the Docker container for the mysql database.

The actual database commands are in two files:

- `createuser.sql`

  This file contains the sql necessary to create a non-root user.

- `tech_support.sql`

  This file contains the commands required to create the database and all necessary tables for the web application. It further inserts a number of records into the database.
