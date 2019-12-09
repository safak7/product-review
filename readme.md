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
In Docker Php Container
The following command must be run to create vendor files
```bash
composer install
```
If composer is not installed on your system, [download composer](https://getcomposer.org/download)

##USAGE

### Queue

To run the single worker of queue messages that will process
The following commands should be executed by connecting to Docker Php Container.  
```bash
php artisan queue:work --queue CHECK_BAD_WORDS

php artisan queue:work --queue SEND_NOTIFICATION
```

or

You can run all consumers using the Supervisor. 
To use the Supervisor, connect to Docker Php Container and
you should run the following command.
```bash
supervisorctl start all
```

For the Service to work, queue workers must work continuously.

###API Request

The service uses Basic Auth for authentication.
Basic Auth information in the .env file API_USERNAME and API_PASSWORD keys.

To create a product review with the Basic Auth information in the .env file
You should submit a request sample request.

Sample request:
[POST] http://product.review-local.net/api/reviews
```bash
'Content-Type: application/json' 
{
    "name": "Elvis Presley",
    "email": "theking@elvismansion.com",
    "productid": "1",
    "review": "I really love the product and will recommend!"
} 
```

##PHPUNIT

Unit testleri çalıştımak için aşağıdaki komutu Docker Php Container'ına bağlanarak çalıştırılmalı.

To run unit tests, you must run the following command by connecting to the Docker Php Container
```bash
vendor/bin/phpunit
```

##General Infos

System Log files are stored in the storage/logs directory.

Instead of simulating notification email sending, 
sample mail content is written to files in storage/app directory reviewIDreview.txt