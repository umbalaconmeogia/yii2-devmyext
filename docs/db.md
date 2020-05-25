# Database command

## Prepare for PostgreSQL

* Open postgres shell
    On Windows
    ```shell
    psql -U postgres
    ```
* Create database
    ```sql
    CREATE USER devmyext WITH PASSWORD 'devmyext';

    CREATE DATABASE devmyext;
    GRANT ALL PRIVILEGES ON DATABASE devmyext TO devmyext;
    ```

## Prepare for MySQL

* Create database
    ```sql
    CREATE USER devmyext IDENTIFIED BY 'devmyext';
    CREATE DATABASE devmyext CHARACTER SET UTF8;
    GRANT ALL PRIVILEGES ON devmyext.* TO 'devmyext';
    ```

## Prepare for SQLite

At this time, because model `Page` uses `NOW()` expression, `bupy7/yii2-pages` does not work with sqlite.
I've reported it to the author [here]()