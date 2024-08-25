# Dokumentasi Rute Aplikasi

Dokumentasi ini menjelaskan rute-rute yang tersedia dalam aplikasi, termasuk API dan web. Harap merujuk ke tabel berikut untuk detail tentang setiap rute.

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
