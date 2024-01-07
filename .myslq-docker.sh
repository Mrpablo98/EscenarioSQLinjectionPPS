#docker volume create mysql-db-data

docker run -d -p 33060:3306 --name mysql-db  -e MYSQL_ROOT_PASSWORD=secret --mount src=mysql-db-data,dst=/var/lib/mysql mysql

docker exec -it mysql-db mysql -p
