#!/bin/bash

# Check the environment to determine which script to execute
if [ "$DB_DRIVER" == "mysql" ]; then
    echo "Initializing MySQL database..."
    mysql -u$DB_USER -p$DB_PASS -h$DB_HOST $DB_NAME < /docker-entrypoint-initdb.d/db_init_mysql.sql
elif [ "$DB_DRIVER" == "pgsql" ]; then
    echo "Initializing PostgreSQL database..."
    psql -U $DB_USER -d $DB_NAME -h $DB_HOST -f /docker-entrypoint-initdb.d/db_init_postgres.sql
fi

# Start the main application process
exec "$@"
