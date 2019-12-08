# Product Review Service

## Installation Procedures

#### Installation settings for Docker
The docker-compose.yml.dist file should be changed to docker-compose.yml and docker-compose.yml.dist file **should not be deleted!**

The docker.dist folder must be copied and pasted into the same directory as the docker only. docker.dist folder **should not be deleted!**

The .env.dist file must be copied and pasted into the same directory as .env only. .env.dist file **should not be deleted!**

The queue.php.dist file in the config folder should be copied and pasted into the same directory as queue.php, 
if necessary, the information in it should be edited. .queue.php.dist file **should not be deleted!**

The filesystems.php.dist file in the config folder should be copied and pasted into the same directory as filesystems.php, 
if necessary, the information in it should be edited. .filesystems.php.dist file **should not be deleted!** 

#### Local Domain Definition:

The following domain should be defined in the /etc/host of the computer being used and given 127.0.0.1 as ip.

```bash
127.0.0.1 product.review-local.net
```

The following line should be run if the project was first cloned or if there are any changes to the docker files within the project.

```bash
docker-compose build
```

Project run from docker
```bash
docker-compose up
```

#### Migration Operation
To migrate the new tables created;

Connect to Docker Php container
```bash
docker exec -it product_review_php bash
```

then run the following command.
```bash
php artisan migrate
```

#### Composer Installation
Docker Php Container'ı içerisinde vendor dosyalarının 
oluşturulması için aşağıdaki komut çalıştırılmalı

In Docker Php Container
The following command must be run to create vendor files
```bash
composer install
```

## Queue
To run the workers of queue messages that will process
The following commands should be executed by connecting to Docker Php Container.  
```bash
php artisan queue:work --queue CHECK_BAD_WORDS

php artisan queue:work --queue SEND_NOTIFICATION
```
For the Service to work, queue workers must work continuously.
