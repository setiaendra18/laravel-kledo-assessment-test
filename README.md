## LARAVEL 8 DENGAN CONSUME IP MENGGUNAKAN VUE JS DAN AXIOS

### GIT CLONE 

#### 1. JALANKAN TERMINAL GIT DI FOLDER WEBSITE DAN DUPLIKAT .ENV FILES
```console
cp .env.example .env
```
#### 2. MODIFIKASI SETTING DI .ENV
```javascript
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kledo_assesment (sesuaikan dengan komputer)
DB_USERNAME=root (sesuaikan dengan komputer)
DB_PASSWORD= (sesuaikan dengan komputer)
```
#### 3. COPY FILE konfigurasi midtrans pada file .text di file zip dotENV.ZIP, pastekan pada bagian bawah .env
#### 4. BUAT DATABASE KOSONG DI SERVER (phpmyadmin) 
#### 5. JALANKAN COMPOSER DI TERMINAL & INSTALL PACKAGE NODES
```console
composer install
npm install
```
### JALANKAN GENERATE KEY DI TERMINAL
```console
php artisan key:generate
```
#### 6. JALANKAN MIGRASI DATABASE (Proses Generate Tabel Dari Laravel ke Database)
```console
php artisan migrate:refresh --seed
```
#### 7. MENJALANKAN APLIKASI BACKEND
```console
php artisan serve
```
#### 8. MENJALANKAN VUE
```console
npm run watch
atau
npm run build
```
# DOKUMENTASI API

#### 1. EMPLOYEES
```console
GET http://127.0.0.1:8000/api/empolyees (Fetch all data employee)
POST http://127.0.0.1:8000/api/empolyee (store data employee)
```
#### 2. OVERTIMES
```console
GET http://127.0.0.1:8000/api/overtimes (Fetch all data employee)
POST http://127.0.0.1:8000/api/overtimes (store data overtimes)
```
#### 3. REFERENCES
```console
GET http://127.0.0.1:8000/api/references (Fetch all data references)
```
