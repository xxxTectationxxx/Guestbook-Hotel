# Guestbook-Hotel

**Guestbook-Hotel** is a deliberately vulnerable PHP-based guestbook application created for educational and security training purposes. It simulates common web vulnerabilities to help learners understand and practice identifying and mitigating security issues.

## ⚠️ Disclaimer

This project contains intentional security vulnerabilities and is intended **solely for educational purposes**. Do **not** deploy this application in a production environment or on publicly accessible servers. The author is not responsible for any misuse or damages resulting from the use of this code.

## 🛠️ Features

-User registration and login system

-Guestbook for submitting and viewing message
-Admin panel for managing user entrie
-Designed to include common vulnerabilities such as
  -SQL Injectio
  -Cross-Site Scripting (XSS
  -Insecure Direct Object References (IDOR

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
- Identify and exploit common web vulnerabilites.
- Understand the importance of secure coding practies.
- Practice using security tools in a controlled environmnt.
