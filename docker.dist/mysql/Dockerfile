FROM mysql:5.7

ENV MYSQL_DATABASE adventureworks
ENV MYSQL_ROOT_PASSWORD 11223344

VOLUME /var/lib/mysql

EXPOSE 3306
CMD ["mysqld"]

ADD AWBackup.sql /docker-entrypoint-initdb.d