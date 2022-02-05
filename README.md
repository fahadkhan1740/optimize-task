## OptimizeApp Task

Created End-points for uploading media for different social media providers.

#### Installation

1. Prerequisites Required
   1. PHP 7.4
   2. MySQL 5.7 and above
   3. [FFmpeg](https://ffmpeg.org)

2. Clone the repository and run the following command
```
composer install
```
3. Run the migrations

Please update your `.env` file to point to an empty database before running the following command

```
php artisan migrate
```
4. Run the Seeders
```
php artisan db:seed ProviderSeeder
```
5. Update the `APP_URL` in the `.env` file as `https://localhost:8000`
6. Create symlinks for the file uploads
```
php artisan storage:link
```
7. Run the application using the following command
```
php artisan serve
```

---

#### API Endpoints

Please find the Postman Collection attached [here](https://github.com/fahadkhan1740/optimize-task/files/8008509/OptimizeApp.Task.postman_collection.json.zip). 

#### Unit Test

A couple of tests are covered but not all. You can run them using the following command

```
./vendor/bin/phpunit
```

#### Contact 
If you face any issues, feel free to reach out to me.
