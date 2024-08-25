# Dokumentasi Rute Aplikasi

Dokumentasi ini mencakup semua rute yang tersedia dalam aplikasi, baik untuk API maupun rute web.

## Rute API

| Metode | URL                                      | Controller / Fungsi                                      |
|--------|------------------------------------------|----------------------------------------------------------|
| POST   | `api/auth/login`                         | `Api\AuthenticationController@login`                     |
| POST   | `api/logout`                             | `Api\LogoutController@logout`                            |
| GET    | `api/mass-user`                          | `Api\CreateManyUserController@index`                     |
| POST   | `api/mass-user/body`                     | `Api\MassUserController@store`                           |
| POST   | `api/register`                           | `Api\RegisterController@register`                        |
| GET    | `api/user`                               | `Api\UserController@show`                                |
| GET    | `api/users`                              | `Api\UserManagementController@index`                     |
| POST   | `api/users`                              | `Api\UserManagementController@store`                     |
| PUT    | `api/users/{user}`                       | `Api\UserManagementController@update`                    |
| DELETE | `api/users/{user}`                       | `Api\UserManagementController@destroy`                   |

## Rute Web

| Metode | URL                                      | Controller / Fungsi                                      |
|--------|------------------------------------------|----------------------------------------------------------|
| GET    | `confirm-password`                       | `Auth\ConfirmablePasswordController@show`                |
| POST   | `confirm-password`                       | `Auth\ConfirmablePasswordController@store`               |
| GET    | `dashboard`                              | `DashboardController@index`                             |
| POST   | `email/verification-notification`        | `Auth\EmailVerificationNotificationController@store`    |
| GET    | `forgot-password`                        | `Auth\PasswordResetLinkController@create`               |
| POST   | `forgot-password`                        | `Auth\PasswordResetLinkController@store`                |
| GET    | `login`                                  | `Auth\AuthenticatedSessionController@create`            |
| POST   | `login`                                  | `Auth\AuthenticatedSessionController@store`             |
| POST   | `logout`                                 | `Auth\AuthenticatedSessionController@destroy`           |
| PUT    | `password`                               | `Auth\PasswordController@update`                        |
| GET    | `profile`                                | `ProfileController@edit`                                |
| PATCH  | `profile`                                | `ProfileController@update`                              |
| DELETE | `profile`                                | `ProfileController@destroy`                             |
| GET    | `register`                               | `Auth\RegisteredUserController@create`                  |
| POST   | `register`                               | `Auth\RegisteredUserController@store`                   |
| POST   | `reset-password`                         | `Auth\NewPasswordController@store`                      |
| GET    | `reset-password/{token}`                  | `Auth\NewPasswordController@create`                     |
| GET    | `sanctum/csrf-cookie`                    | `Laravel\Sanctum\CsrfCookieController@show`             |
| GET    | `up`                                      | `HealthCheckController@status`                          |
| GET    | `user-management`                        | `UserManagementController@index`                        |
| POST   | `user-management`                        | `UserManagementController@store`                        |
| GET    | `user-management/create`                 | `UserManagementController@create`                       |
| GET    | `user-management/{user_management}`      | `UserManagementController@show`                         |
| PUT    | `user-management/{user_management}`      | `UserManagementController@update`                       |
| PATCH  | `user-management/{user_management}`      | `UserManagementController@update`                       |
| DELETE | `user-management/{user_management}`      | `UserManagementController@destroy`                      |
| GET    | `user-management/{user_management}/edit` | `UserManagementController@edit`                         |
| GET    | `verify-email`                           | `Auth\EmailVerificationPromptController@show`           |
| GET    | `verify-email/{id}/{hash}`               | `Auth\VerifyEmailController@verify`                     |

## Penjelasan Rute

### Rute API
- **`POST api/auth/login`**: Digunakan untuk autentikasi pengguna.
- **`POST api/logout`**: Digunakan untuk logout pengguna.
- **`GET api/mass-user`**: Mengambil data pengguna dalam jumlah besar.
- **`POST api/mass-user/body`**: Menambahkan banyak pengguna sekaligus.
- **`POST api/register`**: Digunakan untuk mendaftar pengguna baru.
- **`GET api/user`**: Mengambil data pengguna saat ini.
- **`GET api/users`**: Mengambil daftar semua pengguna.
- **`POST api/users`**: Menambahkan pengguna baru.
- **`PUT api/users/{user}`**: Memperbarui data pengguna tertentu.
- **`DELETE api/users/{user}`**: Menghapus pengguna tertentu.

### Rute Web
- **`confirm-password`**: Menampilkan form konfirmasi kata sandi.
- **`dashboard`**: Halaman utama dashboard pengguna.
- **`email/verification-notification`**: Mengirim notifikasi verifikasi email.
- **`forgot-password`**: Menampilkan form untuk reset kata sandi.
- **`login`**: Menampilkan form login.
- **`logout`**: Menghentikan sesi pengguna.
- **`password`**: Memperbarui kata sandi pengguna.
- **`profile`**: Menampilkan dan mengedit profil pengguna.
- **`register`**: Menampilkan form pendaftaran pengguna baru.
- **`reset-password`**: Menetapkan kata sandi baru setelah reset.
- **`sanctum/csrf-cookie`**: Mendapatkan cookie CSRF untuk Laravel Sanctum.
- **`up`**: Memeriksa status aplikasi (health check).
- **`user-management`**: Mengelola daftar pengguna.
- **`verify-email`**: Menampilkan notifikasi verifikasi email.
- **`verify-email/{id}/{hash}`**: Memverifikasi email pengguna.

## Kontribusi

Jika Anda menemukan masalah atau ingin menambahkan fitur baru, silakan lakukan fork dari repositori ini dan kirimkan pull request dengan perubahan yang diusulkan.

## Lisensi

Aplikasi ini dilisensikan di bawah [MIT License](LICENSE).

---

Untuk pertanyaan atau masalah lainnya, buka masalah di repositori atau hubungi tim pengembang.
