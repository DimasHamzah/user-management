# Dokumentasi API Laravel

Dokumentasi ini menjelaskan rute web yang tersedia dalam aplikasi Laravel Anda, termasuk endpoint untuk autentikasi, manajemen pengguna, dan lainnya.

## Rute Web

### 1. **Root Route**
- **URL**: `/`
- **Method**: `GET|HEAD`
- **Controller**: -
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

- **Confirm Password**
  - **URL**: `confirm-password`
  - **Method**: `GET|HEAD` (Tampilkan halaman konfirmasi password)
  - **Method**: `POST` (Kirim konfirmasi password)
  - **Controller**: `Auth\ConfirmablePasswordController`
  - **Deskripsi**: Mengkonfirmasi password saat melakukan aksi tertentu.

- **Forgot Password**
  - **URL**: `forgot-password`
  - **Method**: `GET|HEAD` (Tampilkan halaman permintaan reset password)
  - **Method**: `POST` (Kirim permintaan reset password)
  - **Controller**: `Auth\PasswordResetLinkController`
  - **Deskripsi**: Mengirimkan link untuk reset password.

- **Reset Password**
  - **URL**: `reset-password`
  - **Method**: `POST`
  - **Controller**: `Auth\NewPasswordController@store`
  - **Deskripsi**: Menyimpan password baru setelah reset.
  - **URL**: `reset-password/{token}`
  - **Method**: `GET|HEAD`
  - **Controller**: `Auth\NewPasswordController@create`
  - **Deskripsi**: Tampilkan halaman untuk membuat password baru.

### 3. **Dashboard**
- **URL**: `dashboard`
- **Method**: `GET|HEAD`
- **Controller**: -
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

### 5. **Profile Management**
- **View Profile**
  - **URL**: `profile`
  - **Method**: `GET|HEAD`
  - **Controller**: `ProfileController@edit`
  - **Deskripsi**: Menampilkan halaman edit profil.

- **Update Profile**
  - **URL**: `profile`
  - **Method**: `PATCH`
  - **Controller**: `ProfileController@update`
  - **Deskripsi**: Memperbarui informasi profil pengguna.

- **Delete Profile**
  - **URL**: `profile`
  - **Method**: `DELETE`
  - **Controller**: `ProfileController@destroy`
  - **Deskripsi**: Menghapus profil pengguna.

### 6. **User Management API**
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

### 7. **Mass User Creation API**
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

### 8. **CSRF Cookie**
- **URL**: `sanctum/csrf-cookie`
- **Method**: `GET|HEAD`
- **Controller**: `Laravel\Sanctum\CsrfCookieController@show`
- **Deskripsi**: Mengambil cookie CSRF untuk Laravel Sanctum.

### 9. **User Management (Web Routes)**
- **List User Management**
  - **URL**: `user-management`
  - **Method**: `GET|HEAD`
  - **Controller**: `UserManagementController@index`
  - **Deskripsi**: Menampilkan daftar manajemen pengguna.

- **Create User Management**
  - **URL**: `user-management/create`
  - **Method**: `GET|HEAD`
  - **Controller**: `UserManagementController@create`
  - **Deskripsi**: Menampilkan form untuk membuat manajemen pengguna baru.

- **Show User Management**
  - **URL**: `user-management/{user_management}`
  - **Method**: `GET|HEAD`
  - **Controller**: `UserManagementController@show`
  - **Deskripsi**: Menampilkan detail manajemen pengguna.

- **Update User Management**
  - **URL**: `user-management/{user_management}`
  - **Method**: `PUT|PATCH`
  - **Controller**: `UserManagementController@update`
  - **Deskripsi**: Memperbarui manajemen pengguna.

- **Delete User Management**
  - **URL**: `user-management/{user_management}`
  - **Method**: `DELETE`
  - **Controller**: `UserManagementController@destroy`
  - **Deskripsi**: Menghapus manajemen pengguna.

- **Edit User Management**
  - **URL**: `user-management/{user_management}/edit`
  - **Method**: `GET|HEAD`
  - **Controller**: `UserManagementController@edit`
  - **Deskripsi**: Menampilkan form untuk mengedit manajemen pengguna.

---

Dokumentasi ini dirancang untuk memberikan panduan lengkap mengenai rute web dalam aplikasi Laravel Anda. Pastikan untuk memeriksa detail implementasi pada kode sumber dan menyesuaikan dengan kebutuhan spesifik proyek Anda.
