You have a PHP application for orders batch processing.

Program will be tested using command
```bash
php order_processing.php order.csv
```
Obviously input file can contain different rows.

To make work with application easier you can use docker-compose:
```bash
docker-compose up -d # start application
docker-compose down # stop and remove containers
docker-compose exec app bash # connect to container command line
docker-compose exec app php order_processing.php orders.csv # execute application
```