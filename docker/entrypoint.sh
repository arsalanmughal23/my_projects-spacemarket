#!/bin/sh
set -e

PROJECT_ROOT=/var/www/html

echo "→ Fixing storage/cache permissions..."
mkdir -p "$PROJECT_ROOT/storage/logs" \
         "$PROJECT_ROOT/storage/framework/cache" \
         "$PROJECT_ROOT/storage/framework/sessions" \
         "$PROJECT_ROOT/storage/framework/views" \
         "$PROJECT_ROOT/bootstrap/cache"

echo "→ Ensuring .env exists..."
if [ ! -f "$PROJECT_ROOT/.env" ]; then
    if [ -f "$PROJECT_ROOT/.env.example" ]; then
        cp "$PROJECT_ROOT/.env.example" "$PROJECT_ROOT/.env"
        echo "   Created .env from .env.example"
    else
        echo "   ERROR: .env and .env.example both missing — aborting."
        exit 1
    fi
fi

echo "→ Running composer install..."
if [ ! -d "$PROJECT_ROOT/vendor" ]; then
    composer install --no-interaction --prefer-dist --optimize-autoloader
    chown -R www-data:www-data "$PROJECT_ROOT/vendor"
fi

echo "→ Generating app key (if missing)..."
if ! grep -q "^APP_KEY=base64:" "$PROJECT_ROOT/.env"; then
    php "$PROJECT_ROOT/artisan" key:generate --force
fi

echo "→ Ensuring SQLite database file exists..."
DB_CONN=$(grep -E "^DB_CONNECTION=" "$PROJECT_ROOT/.env" | cut -d '=' -f2 | tr -d '"' | tr -d "'")
if [ "$DB_CONN" = "sqlite" ]; then
    DB_PATH=$(grep -E "^DB_DATABASE=" "$PROJECT_ROOT/.env" | cut -d '=' -f2 | tr -d '"' | tr -d "'")
    if [ -z "$DB_PATH" ]; then
        DB_PATH="database/database.sqlite"
    fi
    case "$DB_PATH" in
        /*) FULL_PATH="$DB_PATH" ;;
        *)  FULL_PATH="$PROJECT_ROOT/$DB_PATH" ;;
    esac

    mkdir -p "$(dirname "$FULL_PATH")"
    if [ ! -f "$FULL_PATH" ]; then
        touch "$FULL_PATH"
        echo "   Created SQLite file at $FULL_PATH"
    fi
    chown www-data:www-data "$FULL_PATH"
    chmod 664 "$FULL_PATH"
fi

echo "→ Running migrations..."
php "$PROJECT_ROOT/artisan" migrate --force

echo "→ Running seeders (first run only)..."
if [ ! -f "$PROJECT_ROOT/storage/.seeded" ]; then
    php "$PROJECT_ROOT/artisan" db:seed --force && touch "$PROJECT_ROOT/storage/.seeded"
else
    echo "   Skipping — seeder marker exists."
fi

echo "→ Starting PHP-FPM..."
exec "$@"