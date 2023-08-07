#### dockers

    docker exec -it yusam-php81 bash
    docker exec -it yusam-php81 sh -c "htop"

    docker exec -it yusam-php81 sh -c "cd /var/www/data/yusam/github/yusam-hub/telegram-sdk && composer update"
    docker exec -it yusam-php81 sh -c "cd /var/www/data/yusam/github/yusam-hub/telegram-sdk && sh phpunit"

#### curl