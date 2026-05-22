#!/bin/bash
# IKO OPTIC LTD - Setup Script
# Run this script to initialize the database

echo "================================"
echo "  IKO OPTIC LTD - Setup"
echo "================================"
echo ""

# Check if MySQL is available
if ! command -v mysql &> /dev/null; then
    echo "MySQL client not found. Please install MySQL/MariaDB first."
    exit 1
fi

read -p "MySQL Host [localhost]: " DB_HOST
DB_HOST=${DB_HOST:-localhost}

read -p "MySQL Username [root]: " DB_USER
DB_USER=${DB_USER:-root}

read -sp "MySQL Password: " DB_PASS
echo ""

echo ""
echo "Creating database and tables..."
mysql -h "$DB_HOST" -u "$DB_USER" -p"$DB_PASS" < database/migrations/001_create_tables.sql

if [ $? -eq 0 ]; then
    echo "✓ Tables created successfully"
else
    echo "✗ Error creating tables"
    exit 1
fi

echo "Seeding initial data..."
mysql -h "$DB_HOST" -u "$DB_USER" -p"$DB_PASS" < database/seeds/seed.sql

if [ $? -eq 0 ]; then
    echo "✓ Data seeded successfully"
else
    echo "✗ Error seeding data"
    exit 1
fi

# Update .env file
sed -i "s/DB_HOST=.*/DB_HOST=$DB_HOST/" .env
sed -i "s/DB_USER=.*/DB_USER=$DB_USER/" .env
sed -i "s/DB_PASS=.*/DB_PASS=$DB_PASS/" .env

echo ""
echo "================================"
echo "  Setup Complete!"
echo "================================"
echo ""
echo "Admin Login Credentials:"
echo "  Email: admin@ikooptic.co.ke"
echo "  Password: password"
echo ""
echo "Start the development server:"
echo "  php -S localhost:8000 -t public"
echo ""
echo "Then visit:"
echo "  Website: http://localhost:8000"
echo "  Admin:   http://localhost:8000/admin"
echo ""
