
# 使用官方 PHP 映像檔
FROM php:8.1-apache

# 安裝必要套件，例如 git、zip、unzip（for composer）
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip

# 安裝 Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 將專案檔案複製進容器內部
COPY . /var/www/html/

# 設定工作目錄
WORKDIR /var/www/html/

# 安裝 PHP 套件（使用 composer.json）
RUN composer install

# 開啟 Apache 的 rewrite 模組（如需 .htaccess）
RUN a2enmod rewrite

# 設定 Apache 服務 port
EXPOSE 80
