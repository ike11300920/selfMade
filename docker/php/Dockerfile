# 使用イメージの指定
FROM php:8.1-fpm

# composer イメージ内から特定のファイルをコピー
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# コマンドの実行
# apt-getコマンドのアップデートと必要なライブラリやドライバのインストール
RUN apt-get update && apt-get install -y \
default-mysql-client \
    git \
    zip \
    unzip \
    curl \
    gnupg \
    && docker-php-ext-install pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

    # Node.jsのインストール
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
    RUN apt-get install -y nodejs
    # php.ini の設定ファイルを作成
    RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
    # Composerを使ってSpotifyのPHPライブラリをインストール
    WORKDIR /var/www/html
    # ファイル・ディレクトリに全権限を付与（開発環境向け）
    RUN chown -R www-data:www-data /var/www/html \
        && chmod -R 777 /var/www/html
    # コンテナの起動時に実行するコマンドを指定（php-fpm）
    CMD ["php-fpm"]
    # ポート9000を公開
    EXPOSE 9000