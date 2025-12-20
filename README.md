# 📝 Dynamic Form Builder – Laravel

A **Dynamic Form Builder Web Application** built with **Laravel**, allowing **Admins** to create customizable forms and **Users** to submit responses dynamically.

Includes form activation/deactivation, response management, and a clean Admin/User separation.

---

## 🚀 Features

### 👨‍💼 Admin Module
- Create dynamic forms
- Add multiple field types:
  - Text
  - Textarea
  - Number
  - Dropdown
  - Checkbox
  - Radio
- Add options for selectable fields
- Activate / Deactivate forms (AJAX-based)
- View all submitted responses
- Dashboard with:
  - Total Forms
  - Total Responses
  - Active Forms count

### 👤 User Module
- View only **Active Forms**
- Fill and submit dynamic forms
- Supports required & optional fields
- Handles multi-select (checkbox) inputs
- Clean and simple UI

---

## 🧩 Tech Stack
- **Backend:** Laravel 10+
- **Frontend:** Blade, Bootstrap 5, jQuery
- **Database:** MySQL
- **AJAX:** jQuery AJAX
- **Version Control:** Git & GitHub

---

## 📂 Project Structure

```
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

## 🗄️ Database Tables

| Table Name | Description |
|-----------|-------------|
| forms | Stores form details & active status |
| form_fields | Stores fields per form |
| field_options | Options for dropdown/checkbox/radio |
| form_responses | Each form submission |
| form_response_values | Field-wise submitted values |

---

## 🧠 Database Relationships
- **Form** → hasMany → FormField
- **Form** → hasMany → FormResponse
- **FormField** → hasMany → FieldOption
- **FormResponse** → hasMany → FormResponseValue
- **FormResponseValue** → belongsTo → FormField

---

## 🔄 Form Activation Logic
- Admin can toggle form status using a switch
- Status updates via AJAX
- UI updates dynamically:
  - Active / Inactive label
  - Active form count
- Stored in `forms.is_active` column

---

## 🧪 Example Screenshots
(Add images inside `public/screenshots/`)

```md
![User Dashboard](Screenshot/image1.png)
![User Form Fill](Screenshot/image2.png)
![Admin Dashboard](screenshot/image3.png)
![Create Form](public/screenshots/create-form.png)
![User Form](public/screenshots/user-form-submit.png)
```

---

## ⚙️ Installation Steps

### 1️⃣ Clone Repository
```bash
git clone https://github.com/your-username/dynamic-form-builder.git
cd dynamic-form-builder
```

### 2️⃣ Install Dependencies
```bash
composer install
```

### 3️⃣ Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` database credentials:
```env
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Run Migrations
```bash
php artisan migrate
```

### 5️⃣ Start Server
```bash
php artisan serve
```

Visit:
```
http://127.0.0.1:8000
```

---

## 🌐 Routes Overview

### Admin Routes
- `/admin`
- `/admin/form/create`
- `/admin/form/{id}/responses`
- `/admin/formStatus` (AJAX)

### User Routes
- `/user`
- `/form/{id}`
- `/form/submit`

---

## 📌 Key Highlights (Interview Ready)
✔ Dynamic form creation  
✔ Reusable field system  
✔ AJAX-based status toggle  
✔ Clean MVC architecture  
✔ Scalable & extensible design  

---

## 🔮 Future Enhancements
- Authentication (Admin/User roles)
- Export responses (CSV / Excel)
- Form analytics & charts
- API version (React / Vue ready)
- Response validation rules per field

---

## 👨‍💻 Author
**Sujilkumar**
