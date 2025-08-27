# Backend Developer Take Home

### Requirements

We’re building a small system to manage subscriptions to digital products (like software tools or
content bundles). Here’s what we need: 

* A user can subscribe to one or more products.
* Each product can have one or more pricing options (e.g., monthly, yearly).
* A subscription is active for a given period and can be cancelled.
* When a subscription is cancelled, it should remain valid until the end of the paid period.
* The system should be able to:
    - Add users and products
    - Subscribe a user to a product
    - Cancel a subscription
    - List all active subscriptions for a given user

You will be evaluated on :
* Code structure and clarity
* How you model the domain
* How you handle ambiguity
* Quality of test coverage
* Thoughtfulness in your approach
* Use of Symfony/PHP patterns (if you claim experience)


### Installation

For this task, I use :
* [Laravel](https://laravel.com/docs/12.x) framework.
* [Docker](https://docs.docker.com/desktop/)
* [Docker Compose](https://docs.docker.com/compose/)



### Serving Your Application

To serve your project locally, you should:

* Run Docker:

```
cd path/to/your/project
docker-compose up -d
```

* Get into docker container command line:

```
docker exec -it --user www-data backend_developer_take_home_app_1 /bin/bash
```

* Run database migration:

```
php artisan migrate:fresh
```

* Seed the database with default Admin user:

```
php artisan db:seed --class="Database\Seeders\UserSeeder"

Default Admin User:
email: admin@example.com
password: admin
```

* Run command to automatically cancel all expired subscriptions:

```
php artisan user:cancel-subscriptions
```

* Lastly, open:
[Localhost](http://localhost/)




### Database Structure

![20250826_213605](https://github.com/user-attachments/assets/27c1b1af-da32-4a1e-8eac-792800c3a92b)
