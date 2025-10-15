Deployment Guide <br>
Deploying the Employee Management application involves a two-part process: setting up the Laravel back-end on a server and deploying the React front-end to a static host. For the Laravel API, you will need to configure your production environment variables (like database credentials and app URL). <br>
Install composer dependencies using composer install --optimize-autoloader --no-dev.<br>
If you have already have the composer, run composer update. <br>
Update the .env according to your environment. <br>
Run database migrations with php artisan migrate. <br>
Configure your web server (like Nginx or Apache) to point to the /public directory.<br>
<br>
For the React front-end, you will serve it directly from your Laravel application. <br>
First, create a production build by running npm run build within your React project's directory. <br>
After the build completes, copy all the generated files and folders from the build directory and paste them directly into the public folder of your Laravel application. This setup allows Laravel's web server to serve your React application's index.html and its associated assets.
