FROM php:8.4-fpm-bookworm

# 1. Instalação do certificado SSL corporativo (Fortinet)
COPY fortinet.cer /usr/local/share/ca-certificates/fortinet.crt
RUN update-ca-certificates

# 2. Altera os repositórios para HTTPS usando a sintaxe correta do Debian Bookworm
RUN sed -i 's|http://deb.debian.org|https://deb.debian.org|g' /etc/apt/sources.list.d/debian.sources

# 3. Instala dependências do sistema e utilitários
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    ca-certificates \
    openssl \
    nodejs \
    npm \
    libgbm-dev \
    python3 \
    python3-pip \
    python3-opencv \
    && rm -rf /var/lib/apt/lists/*

# 4. Instala o Node.js 22 e NPM
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# 5. Instala as extensões PHP necessárias para o Laravel
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    sockets

# 6. Copia o binário do Composer mais recente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 7. Define o diretório de trabalho padrão
WORKDIR /var/www

# 12. Ajusta as permissões de pastas para o usuário do PHP-FPM
RUN chown -R www-data:www-data /var/www

EXPOSE 9000
CMD ["php-fpm"]
