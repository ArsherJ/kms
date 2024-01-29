# KMS (KA-In Management System) Installation Guide

## Prerequisites
Before you can run the KMS application locally, you need to have the following software installed on your system:

- XAMPP 8.2.4
- Composer
- Git (optional)

## Downloading the Source Code

### Option 1 (via Git):
1. Open your terminal.
2. Change your working directory to the XAMPP htdocs folder:
    ```
    cd C:/xampp/htdocs
    ```
3. Clone the KMS repository using Git:
    ```
    git clone https://github.com/jrglomar/kms
    ```

### Option 2 (via Manual Download):
1. Visit the KMS repository on GitHub: [https://github.com/jrglomar/kms](https://github.com/jrglomar/kms).
2. Click the green "Code" button and select "Download ZIP."
3. Extract the downloaded ZIP file to your C:/xampp/htdocs directory.

## Installing and Setting Up the App
1. Open your terminal or command line interface.
2. Change your working directory to the KMS app directory:
    ```
    cd C:/xampp/htdocs/kms
    ```
3. Install the application's dependencies using Composer:
    ```
    composer install
    ```
4. Copy the .env.example file and create a new .env file:
    ```
    copy .env.example .env
    ```
5. Generate an application key:
    ```
    php artisan key:generate
    ```
6. Open XAMPP and start both Apache and MySQL.
7. Access phpMyAdmin in your web browser at [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
8. Create a new database named "kms" by clicking "New" on the left sidebar.
9. In your terminal, run the following command to migrate the database and seed it with initial data:
    ```
    php artisan migrate:fresh --seed
    ```

## Starting the App Locally
If you have already installed and set up the app, you can start it locally with the following steps:

1. Open the xampp and make sure the Apache and MySQL is started
2. Open your terminal or command line interface. Change your working directory to the KMS app directory:
    ```
    cd C:/xampp/htdocs/kms
    ```
3. Start the application:
    ```
    php artisan serve
    ```
4. Open your web browser and navigate to the server address (by default, it's [http://127.0.0.1:8000](http://127.0.0.1:8000)) to access the KMS application.

You have successfully installed, set up, and started the KMS (KA-In Monitoring System) application locally. Enjoy using it!


## Login at APP_URL/login to setup system
<div>
    <table>
        <thead>
            <tr>
                <th><strong>User</strong></th>
                <th><strong>Password</strong></th>
                <th><strong>Role</strong></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>admin</td>
                <td>User01</td>
                <td>Admin</td>
            </tr>
            <tr>
                <td>user</td>
                <td>User01</td>
                <td>User</td>
            </tr>
        </tbody>
    </table>
</div>
