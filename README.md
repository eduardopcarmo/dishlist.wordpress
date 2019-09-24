# DishList.Wordpress

You need Docker to run this application.

---

#### First Time Usage

1: Run `docker-compose up -d` in the project root directory. Wait for the containers to be built.

---

#### Running Worpress Website

1: You'll be able to access in the address: `http://localhost:8000` (Website) and `http://localhost:8000/wp-admin/` (Dashboard)

2: Use **User**: team4 and **Password**: \$zOXx#PgHUSMWC3TC5

---

#### Running PhpMyAdmin

1: You'll be able to access in the address: `http://localhost:8080`

2: Use **User**: root and **Password**: langara

---

#### How to dump wordpress db in MySQL

1: You'll need to discovery the name of your MySQL docker Container. To do this, run this command in your terminal:

- docker ps

2: Find line with the IMAGE column "mysql:5.7", the last column has the name of your docker Container.

3: Replace MYSQL_CONTAINER_NAME with the name of your docker container, and run this command in yout terminal:

- docker exec MYSQL_CONTAINER_NAME /usr/bin/mysqldump --user="root" --password="langara" wordpress > db_dump/wordpress_dump.sql

---

#### How to "Restart" all docker Container used in this project (DON'T DO!!!!!!!!!!!)

You'll stop all docker Containers in use in this project and remove all stopped containers, all dangling images, and all unused networks (for all docker container in your computer)

1: Run this command to stop all the tree docker container that you discovery tha name:

- docker-compose down -v

2: After stop all the tree docker container, run this command:

- docker system prune
