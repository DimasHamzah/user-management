# Dokumentasi API Laravel

Dokumentasi ini menjelaskan rute yang tersedia dalam aplikasi Laravel Anda, dibagi menjadi dua kategori: **Rute Web** dan **Rute API**.

## Rute Web

### 1. **Root Route**
- **URL**: `/`
- **Method**: `GET|HEAD`
- **Deskripsi**: Halaman utama aplikasi.

### 2. **Dashboard**
- **URL**: `dashboard`
- **Method**: `GET|HEAD`
- **Deskripsi**: Halaman dashboard pengguna.

### 3. **Email Verification**
- **Verification Notification**
  - **URL**: `email/verification-notification`
  - **Method**: `POST`
  - **Controller**: `Auth\EmailVerificationNotificationController@store`
  - **Deskripsi**: Mengirimkan email verifikasi ulang.

- **Verify Email**
  - **URL**: `verify-email`
  - **Method**: `GET|HEAD`
  - **Controller**: `Auth\EmailVerificationPromptController`
  - **Deskripsi**: Menampilkan halaman verifikasi email.

  - **URL**: `verify-email/{id}/{hash}`
  - **Method**: `GET|HEAD`
  - **Controller**: `Auth\VerifyEmailController`
  - **Deskripsi**: Mengonfirmasi email verifikasi.

### 4. **Profile Management**
- **Profile Edit**
  - **URL**: `profile`
  - **Method**: `GET|HEAD`
  - **Controller**: `ProfileController@edit`
  - **Deskripsi**: Menampilkan halaman edit profil pengguna.

  - **URL**: `profile`
  - **Method**: `PATCH`
  - **Controller**: `ProfileController@update`
  - **Deskripsi**: Memperbarui data profil pengguna.

  - **URL**: `profile`
  - **Method**: `DELETE`
  - **Controller**: `ProfileController@destroy`
  - **Deskripsi**: Menghapus profil pengguna.

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
  - **Controller**: `Auth\AuthenticatedSessionController@destroy`
  - **Deskripsi**: Melakukan logout pengguna.

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
  - **Controller**: `Api\CreateManyUserController`
  - **Deskripsi**: Endpoint untuk memproses pembuatan pengguna massal secara otomatis.

- **Mass User Creation with Body**
  - **URL**: `api/mass-user/body`
  - **Method**: `POST`
  - **Controller**: `Api\MassUserController`
  - **Deskripsi**: Mengirimkan data pengguna dalam jumlah besar melalui body permintaan.

### 4. **CSRF Cookie**
- **URL**: `sanctum/csrf-cookie`
- **Method**: `GET|HEAD`
- **Controller**: `Laravel\Sanctum\CsrfCookieController@show`
- **Deskripsi**: Mengambil cookie CSRF untuk Laravel Sanctum.

## Catatan
- **Manajemen Profil**: Rute manajemen profil telah dihapus dari dokumentasi ini sesuai permintaan.
- **Pemisahan Rute**: Rute telah dipisahkan berdasarkan kategori untuk memudahkan pemahaman dan pengelolaan.

Dokumentasi ini dirancang untuk memberikan panduan lengkap mengenai rute web dan API dalam aplikasi Laravel Anda. Pastikan untuk memeriksa detail implementasi pada kode sumber dan menyesuaikan dengan kebutuhan spesifik proyek Anda.
