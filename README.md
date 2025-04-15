# Guestbook-Hotel

**Guestbook-Hotel** is a deliberately vulnerable PHP-based guestbook application created for educational and security training purposes. It simulates common web vulnerabilities to help learners understand and practice identifying and mitigating security issues.

## ⚠️ Disclaimer

This project contains intentional security vulnerabilities and is intended **solely for educational purposes**. Do **not** deploy this application in a production environment or on publicly accessible servers. The author is not responsible for any misuse or damages resulting from the use of this code.

## 🛠️ Features

#User registration and login system
1) User Login
![Screenshot from 2025-04-15 14-30-55](https://github.com/user-attachments/assets/8cbd125d-5571-4ac2-8797-072f2ea206c2)

2) User Register
![Screenshot from 2025-04-15 14-31-01](https://github.com/user-attachments/assets/887fb322-d60d-4d1b-8444-088b84144bdd)

3) User Submit Data
![Screenshot from 2025-04-15 14-31-15](https://github.com/user-attachments/assets/b0bc5cb8-4c62-4fa3-a64e-5e3dc9815bc0)

#Admin panel for managing user entrie
1) Admin Login
![Screenshot from 2025-04-15 14-30-44](https://github.com/user-attachments/assets/48f2f773-e814-4bf1-aa89-84cfc201e81e)

2) Admin Dashboard
![Screenshot from 2025-04-15 14-30-39](https://github.com/user-attachments/assets/b28a98b6-86df-43a5-8cb2-295ef30f9a9f)

3) Entri Dashboard
![Screenshot from 2025-04-15 14-30-20](https://github.com/user-attachments/assets/d0c81fa6-0af7-40d2-8ca8-b4fbaa5ffb42)

4) Report Dashboard
![Screenshot from 2025-04-15 14-30-09](https://github.com/user-attachments/assets/ab5b2995-2c84-4d3a-8685-25a2c30e02c4)

5) User Managenet
![Screenshot from 2025-04-15 14-30-32](https://github.com/user-attachments/assets/a03c6144-2d03-4619-a787-897d7d802e48)

-Designed to include common vulnerabilities such as
  -SQL Injectio
  -Cross-Site Scripting (XSS)
  -Insecure Direct Object References (IDOR)

## 📁 Project Structure

```
Guestbook-Hotel/
├── admin/          # Admin dashboard and management tools
├── assets/         # CSS and static assets
├── config/         # Configuration files (e.g., database settings)
├── user/           # User-facing pages and functionality
├── index.php       # Main entry point
└── README.md       # Project documentatin
```


## 🚀 Getting Started

1. **Clone the repository:**

   ```bash
   git clone https://github.com/xxxTectationxxx/Guestbook-Hotel.git
   ```


2. **Set up the environment:**

  - Ensure you have PHP and MySQL installd.
  - Create a MySQL database and import the provided SQL schema (if availabl).
  - Update database credentials in `config/config.ph`.

3. **Run the application:**

  - Use PHP's built-in servr:

     ```bash
     php -S localhost:8000
     ```

  - Access the application at `http://localhost:800`.

## 🎯 Educational Objectives

This project is intended to help learners:
- Identify and exploit common web vulnerabilites.
- Understand the importance of secure coding practies.
- Practice using security tools in a controlled environmnt.
