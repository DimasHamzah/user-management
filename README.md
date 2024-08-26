# Dokumentasi Rute Aplikasi

## requirment
- ** Setup Laravel Project with Basic Authentication: **
    -  Saya telah menyiapkan proyek Laravel dengan otentikasi dasar menggunakan Laravel Breeze untuk antarmuka web. Proyek ini menyediakan fitur login dan registrasi yang diperlukan untuk mengakses dashboard. Untuk otentikasi API, saya menggunakan Laravel Sanctum untuk menyediakan token-based authentication, memungkinkan akses API yang aman.    
- ** CRUD Interface for User Data and Unit Test: **
    -  Saya telah membuat antarmuka CRUD untuk data pengguna baik melalui web (menggunakan Blade templates) maupun melalui API. Untuk API, rute CRUD dikelola oleh UserManagementController yang mencakup operasi Create, Read, Update, dan Delete untuk data pengguna. Selain itu, saya telah menambahkan unit test untuk memastikan fungsionalitas CRUD berfungsi dengan baik dan sesuai dengan yang diharapkan.
- ** Log Every HTTP Request: **
    - Logging untuk setiap HTTP request telah diimplementasikan menggunakan middleware Laravel. Middleware ini mencatat detail setiap request yang diterima oleh aplikasi, termasuk method HTTP, URL, dan waktu permintaan. Semua log disimpan di file log aplikasi untuk analisis lebih lanjut jika diperlukan.
- ** Email Confirmation After User Creation (Implement Queue): **
    - Setelah pembuatan pengguna baru, email konfirmasi dikirim menggunakan sistem antrian Laravel. Penggunaan queue memungkinkan pengiriman email dilakukan secara asynchronous untuk meningkatkan performa aplikasi. Implementasi ini menggunakan Laravel's built-in queue system yang terhubung dengan driver queue yang sesuai
- ** API Endpoint for Mass User Creation **
    - Saya telah membuat endpoint API khusus untuk pembuatan pengguna massal yang mampu menangani hingga 1000 email dan password dalam satu panggilan. untuk  mass user saya membuat dua, yaitu get (api/mass-user) dan post (api/mass-user/body), kenapa membuat dua, karena dari pada memasukan 1000 data melalui postman lebih baik saya buatkan faker di queuenya, tetapi jika mau menggunakan yang postman, maka gunakan  api/mass-user/body
 
- ** untuk send email saya menggunakan stmp**
    - MAIL_MAILER=smtp
    - MAIL_HOST=smtp.googlemail.com
    - MAIL_PORT=587
    - MAIL_USERNAME=dimashamzah434@gmail.com
    - MAIL_PASSWORD=qjsxwcuehhqfhycl
    - MAIL_ENCRYPTION=tls
    - MAIL_FROM_ADDRESS="dimashamzah434@gmail.com"
    - MAIL_FROM_NAME="Confirmation Your Account"
- ** untuk queue connection menggunakan database **


## catatan
Dokumentasi ini menjelaskan rute-rute yang tersedia dalam aplikasi, termasuk API dan web
## Rute API

### 1. **Autentikasi API**
- **Login**
  - **URL**: `api/auth/login`
  - **Method**: `POST`
  - **Controller**: `Api\AuthenticationController`
  - **Deskripsi**: Melakukan login pengguna.

- **Register**
  - **URL**: `api/register`
  - **Method**: `POST`
  - **Controller**: `Api\RegisterController`
  - **Deskripsi**: Mendaftarkan pengguna baru.

- **Logout**
  - **URL**: `api/logout`
  - **Method**: `POST`
  - **Controller**: `Api\LogoutController`
  - **Deskripsi**: Melakukan logout pengguna. Token akses saat ini akan dihapus.

### 2. **User Management API**
- **List Users**
  - **URL**: `api/users`
  - **Method**: `GET|HEAD`
  - **Controller**: `Api\UserManagementController@index`
  - **Deskripsi**: Menampilkan daftar pengguna.

- **Create User**
  - **URL**: `api/users`
  - **Method**: `POST`
  - **Controller**: `Api\UserManagementController@store`
  - **Deskripsi**: Menambahkan pengguna baru.

- **Update User**
  - **URL**: `api/users/{user}`
  - **Method**: `PUT`
  - **Controller**: `Api\UserManagementController@update`
  - **Deskripsi**: Memperbarui data pengguna.

- **Delete User**
  - **URL**: `api/users/{user}`
  - **Method**: `DELETE`
  - **Controller**: `Api\UserManagementController@destroy`
  - **Deskripsi**: Menghapus pengguna.

### 3. **Mass User Creation API**

- **Mass User Creation**
  - **URL**: `api/mass-user`
  - **Method**: `GET|HEAD`
  - **Controller**: `Api\CreateManyUserController@index`
  - **Deskripsi**: Endpoint ini digunakan untuk membuat 1000 data pengguna secara otomatis. Ketika diakses, endpoint ini akan memicu proses pembuatan data massal menggunakan Faker dan menempatkannya di antrian (queue) untuk diproses di background. Ini berguna untuk skenario di mana Anda ingin menghasilkan data dummy dalam jumlah besar tanpa mengirimkan data melalui permintaan HTTP.

- **Mass User Creation with Body**
  - **URL**: `api/mass-user/body`
  - **Method**: `POST`
  - **Controller**: `Api\MassUserController@store`
  - **Deskripsi**: Endpoint ini memungkinkan Anda untuk mengirim data pengguna dalam jumlah besar melalui body permintaan. Ini berguna jika Anda ingin mengirimkan data secara langsung, misalnya melalui Postman, tanpa menggunakan antrian. Data yang dikirim akan diproses dan disimpan secara langsung.

### 4. **Rute Web**

### 1. **Autentikasi Web**
- **Login**
  - **URL**: `login`
  - **Method**: `GET`
  - **Controller**: `Auth\AuthenticatedSessionController@create`
  - **Deskripsi**: Menampilkan form login.

- **Login Submission**
  - **URL**: `login`
  - **Method**: `POST`
  - **Controller**: `Auth\AuthenticatedSessionController@store`
  - **Deskripsi**: Melakukan login pengguna.

- **Register**
  - **URL**: `register`
  - **Method**: `GET`
  - **Controller**: `Auth\RegisteredUserController@create`
  - **Deskripsi**: Menampilkan form pendaftaran.

- **Register Submission**
  - **URL**: `register`
  - **Method**: `POST`
  - **Controller**: `Auth\RegisteredUserController@store`
  - **Deskripsi**: Mendaftarkan pengguna baru.

### 2. **User Management**
- **List User Management**
  - **URL**: `user-management`
  - **Method**: `GET|HEAD`
  - **Controller**: `UserManagementController@index`
  - **Deskripsi**: Menampilkan daftar user management.

- **Create User Management**
  - **URL**: `user-management`
  - **Method**: `POST`
  - **Controller**: `UserManagementController@store`
  - **Deskripsi**: Menambahkan user management baru.

- **Create User Management Form**
  - **URL**: `user-management/create`
  - **Method**: `GET`
  - **Controller**: `UserManagementController@create`
  - **Deskripsi**: Menampilkan form untuk menambah user management baru.

- **Show User Management**
  - **URL**: `user-management/{user_management}`
  - **Method**: `GET|HEAD`
  - **Controller**: `UserManagementController@show`
  - **Deskripsi**: Menampilkan detail user management tertentu.

- **Update User Management**
  - **URL**: `user-management/{user_management}`
  - **Method**: `PUT|PATCH`
  - **Controller**: `UserManagementController@update`
  - **Deskripsi**: Memperbarui data user management tertentu.

- **Delete User Management**
  - **URL**: `user-management/{user_management}`
  - **Method**: `DELETE`
  - **Controller**: `UserManagementController@destroy`
  - **Deskripsi**: Menghapus user management tertentu.

- **Edit User Management**
  - **URL**: `user-management/{user_management}/edit`
  - **Method**: `GET`
  - **Controller**: `UserManagementController@edit`
  - **Deskripsi**: Menampilkan form untuk mengedit user management tertentu.
