
# 📝 Dynamic Form Builder – Laravel

A **Dynamic Form Builder Web Application** built with **Laravel**, allowing **Admins** to create customizable forms and **Users** to submit responses dynamically.

---

## 🚀 Features

### 👨‍💼 Admin Module
- Create dynamic forms
- Multiple field types (Text, Textarea, Number, Dropdown, Checkbox, Radio)
- Activate / Deactivate forms using AJAX
- View all responses
- Dashboard analytics

### 👤 User Module
- View active forms only
- Submit dynamic forms
- Supports optional & required fields

---

## 🧩 Tech Stack
- Laravel 10+
- Blade + Bootstrap 5
- jQuery & AJAX
- MySQL

---

## 📂 Project Structure
```bash
dynamic-form-builder/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Admin/AdminController.php
│   │       └── User/UserController.php
│   │
│   ├── Models/
│   │   ├── Form.php
│   │   ├── FormField.php
│   │   ├── FieldOption.php
│   │   ├── FormResponse.php
│   │   └── FormResponseValue.php
│
├── database/
│   └── migrations/
│
├── resources/
│   └── views/
│       ├── layouts/
│       ├── admin/
│       └── user/
│
├── routes/
│   └── web.php
│
├── public/
│   └── screenshots/
│
├── README.md
└── composer.json

```

---

## ⚙️ Installation

```bash
git clone https://github.com/your-username/dynamic-form-builder.git
cd dynamic-form-builder
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## 👨‍💻 Author
**Sujil Kumar**
