# Dokumentasi API Laravel

Dokumentasi ini menjelaskan rute web yang tersedia dalam aplikasi Laravel Anda, termasuk endpoint untuk autentikasi, manajemen pengguna, dan pembuatan massal pengguna.

## Rute Web

### 1. **Root Route**
- **URL**: `/`
- **Method**: `GET|HEAD`
- **Deskripsi**: Halaman utama aplikasi.

### 2. **Autentikasi**

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
  - **URL**: `POST /logout`
  - **Method**: `POST`
  - **Controller**: `Auth\AuthenticatedSessionController@destroy`
  - **Deskripsi**: Melakukan logout pengguna.

### 3. **Dashboard**
- **URL**: `dashboard`
- **Method**: `GET|HEAD`
- **Deskripsi**: Halaman dashboard pengguna.

### 4. **Email Verification**
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

### 5. **User Management API**
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

### 6. **Mass User Creation API**
- **Mass User Creation**
  - **URL**: `api/mass-user`
  - **Method**: `GET|HEAD`
  - **Controller**: `Api\CreateManyUserController`
  - **Deskripsi**: Menampilkan halaman atau endpoint untuk membuat pengguna dalam jumlah besar.

- **Mass User Creation with Body**
  - **URL**: `api/mass-user/body`
  - **Method**: `POST`
  - **Controller**: `Api\MassUserController`
  - **Deskripsi**: Mengirimkan data pengguna dalam jumlah besar untuk diproses.

### 7. **CSRF Cookie**
- **URL**: `sanctum/csrf-cookie`
- **Method**: `GET|HEAD`
- **Controller**: `Laravel\Sanctum\CsrfCookieController@show`
- **Deskripsi**: Mengambil cookie CSRF untuk Laravel Sanctum.

---

Dokumentasi ini dirancang untuk memberikan panduan lengkap mengenai rute web dalam aplikasi Laravel Anda. Pastikan untuk memeriksa detail implementasi pada kode sumber dan menyesuaikan dengan kebutuhan spesifik proyek Anda.
