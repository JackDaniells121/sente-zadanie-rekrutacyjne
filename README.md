## Hello

Task description in zadanie-rekrutacyjne.pdf

### Installation

1. Create database and user for this project (You can use phpmyadmin to do that).

-

2. Setup database connection (myslq). Change username and password in .env file
    - DATABASE_URL="mysql://user_name:password@127.0.0.1:3306/sente_recruitment?serverVersion=5.7&charset=utf8mb4"

-

3. Run migration to create tables. Run command in terminal in project folder:
    - php bin/console doctrine:migrations:migrate

-

4. Run data seeder. Run command in terminal:
    - php bin/console doctrine:fixtures:load

-

5. Run symfony web server. Run command in terminal:
    - symfony server:start