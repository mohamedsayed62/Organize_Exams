<div align="center">

# Organize <em>Exams</em>

<p>
A Laravel application for managing student exam workflows, doctor accounts,
and exam scheduling — powered by Excel imports and a clean REST API.
</p>

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=flat-square&logo=php)
![Excel](https://img.shields.io/badge/Maatwebsite_Excel-3.1-217346?style=flat-square)
![License](https://img.shields.io/badge/License-MIT-555555?style=flat-square)

</div>

---

## Overview

| Feature | Description |
|----------|------------|
| 🧑‍⚕️ Doctor Auth | Register & login using Sanctum authentication |
| 📊 Excel Import | Bulk-import students from `.xlsx` files |
| ✅ Exam Tracking | Track exam completion progress |
| 🔐 Google OAuth | Authentication using Socialite |
| ⚡ Reverb | Real-time updates via WebSockets |

---

## Database Schema

### doctors

```text
id
name
email
password
google_id
avatar
timestamps
```

> Doctor accounts and authentication.

### subjects

```text
id
name
doctor_id
location
```

> Exam subjects owned by doctors.

### groups

```text
id
name
number_of_students
doctor_id
subject_id
time
```

> Student exam groups.

### students

```text
id
name
group_id
done_exam
```

> Student records and completion status.

---

## API Reference

### Public

| Method | Endpoint | Description |
|---------|----------|-------------|
| GET | `/api/students/index` | List subjects with group counts |
| GET | `/api/students/showExam/{subjectId}` | View grouped exam data |

### Authentication

| Method | Endpoint |
|---------|----------|
| POST | `/api/doctors/register` |
| POST | `/api/doctors/login` |
| GET | `/api/doctors/logout` |
| GET | `/auth/google` |
| GET | `/auth/google/callback` |

### Protected (`auth:sanctum`)

| Method | Endpoint |
|---------|----------|
| POST | `/api/doctors/index` |
| GET | `/api/doctors/show/{id}` |
| GET | `/api/export/{id}` |
| GET | `/api/doctors/showExam/{subjectId}` |
| PUT | `/api/doctors/updateStudent/{studentId}` |

---

## Installation

```bash
composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

npm install

npm run dev

php artisan serve
```

---

## Google OAuth

Add credentials to `.env`

```env
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URL=http://localhost:8000/auth/google/callback
```

Install Socialite:

```bash
composer require laravel/socialite
```

---

## Laravel Reverb

Configure your `.env`

```env
BROADCAST_CONNECTION=reverb

REVERB_APP_ID=
REVERB_APP_KEY=
REVERB_APP_SECRET=

REVERB_HOST=127.0.0.1
REVERB_PORT=8080
REVERB_SCHEME=http
```

Start WebSocket server:

```bash
php artisan reverb:start
```

---

## Real-Time Flow

```text
Doctor
   │
   ▼
Update Student
   │
   ▼
Event Dispatched
   │
   ▼
Laravel Reverb
   │
   ▼
Laravel Echo
   │
   ▼
Live Dashboard Updated
```

---

## Tech Stack

- Laravel
- PHP 8.3
- MySQL
- Sanctum
- Socialite
- Reverb
- Laravel Excel
- Vite

---

## License

MIT License © Mohamed Sayed
