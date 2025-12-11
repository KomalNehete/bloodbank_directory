# Blood Bank Directory
## Project Overview
The **Blood Bank Directory** is a lightweight PHP web application that lists all blood banks in a selected Indian state.  
It provides a simple, searchable, and paginated view of blood banks with contact information, type, and location.  
The project integrates:
- PHP for backend
- MySQL for database
- HTML/CSS for frontend display
- Python ETL script to generate SQL inserts from CSV data
  
## Features
- List all blood banks in a clean HTML table
- Display details: ID, Name, Type, Location, Contact
- Paginated view (optional enhancement)
- Python ETL script (`generate_sql.py`) to convert CSV → SQL insert statements
- Fully compatible with XAMPP / PHP local development
  
## Folder Structure
bloodbank_directory/
├─ config/
│ └─ db.php # Database connection
├─ models/
│ └─ Institute.php # Data access class
├─ views/
│ └─ list.php # Table view
├─ public/
│ └─ index.php # Main page
├─ sql/
│ └─ inserts.sql # Pre-generated SQL inserts
├─ generate_sql.py # Python ETL script
└─ README.md # Project documentation

## Installation & Setup
1. **Install XAMPP** (PHP, Apache, MySQL) from [https://www.apachefriends.org/](https://www.apachefriends.org/).  
2. Copy the `bloodbank_directory` folder to `C:\xampp\htdocs\`.  
3. Start **Apache** and **MySQL** from XAMPP Control Panel.  
4. Open **phpMyAdmin** → create database `bloodbank_db`.  
5. Import `sql/inserts.sql` into the database.  
6. Open your browser and navigate to:
http://localhost/bloodbank_directory/public/index.php

## Usage
- View all blood banks listed in the table.  
- (Optional) Add filters or pagination for better browsing.  
- Update `sql/inserts.sql` using the Python ETL script if new CSV data is available.
## Python ETL Script

`generate_sql.py` reads a CSV of blood banks and generates SQL insert statements (`inserts.sql`).  

**Usage:**

```bash
python generate_sql.py

##Requirements
XAMPP (PHP 8+, MySQL)
Python 3.x (for ETL script)
Modern browser (Chrome, Firefox, Edge)

##GitHub Repository
Repository link: https://github.com/KomalNehete/bloodbank-directory
