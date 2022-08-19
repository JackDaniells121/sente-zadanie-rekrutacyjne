## Hello

Task description is in zadanie-rekrutacyjne.pdf

Symfony + doctrine + bootstrap + jquery + datatables js.

Datatables plugin have search bar and works fine, so I decided not to do async request to realize filtering data.
<br>
All 2000 products are loaded from database and can be filtered and searched.
<br>
Random image generation for modal is in vanilla js + jquery as well as description which is copied from clicked element neighbour. 

### 🚀 Installation 🚀

1. Create database and user for this project (You can use phpmyadmin to do that).

<br>

2. Setup database connection (myslq). Change username and password in .env file
    - `DATABASE_URL="mysql://user_name:password@127.0.0.1:3306/sente_recruitment?serverVersion=5.7&charset=utf8mb4"`

<br>

3. Run migration to create tables. Run command in terminal in project folder:
    - `php bin/console doctrine:migrations:migrate`

<br>

4. Run data seeder. Run command in terminal:
    - `php bin/console doctrine:fixtures:load`

<br>

5. Run symfony web server. Run command in terminal:
    - `symfony server:start`
   
<br>

6. Go to http://127.0.0.1:8000/product/list


### Screenshots 🖼

![](./public/images/sente_app_screenshot1.png)
![](./public/images/sente_app_screenshot2.png)
![](./public/images/sente_app_screenshot3.png)

### Running test ✅

1. Run in terminal
   - `php bin/phpunit`