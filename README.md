# EcoGreenU
**EcoGreenU** is a school project developed as a web platform that supports **crowdfunding for eco-sustainable and tech-innovative projects**. The goal is to create a digital environment where users can **discover, support, and share green initiatives** that help create a better world.

> _"Help create a better world"_


## About the Project
This application was built as part of a school assignment to explore web development using **PHP**, **MySQL**, **HTML**, **CSS**, and **JavaScript**, with **XAMPP** as the local development environment.

EcoGreenU simulates a fully functional web platform designed for:
- Browsing eco-friendly projects
- Registering and logging in users
- Viewing detailed project pages
- Managing user profiles
- Create new projects
- Donate to eco-sustainable projects

If you'd like to see all my design choices, you can find them within the [Design Choices Report](docs/report.md).
If you wanna take a loot to the class diagram, [here you are](docs/class-diagram.md).


## Features
- Homepage with introductory content
- User registration and login system
- Project listing page with searching
- Project detail view
- About Us page
- User profile page
- Donation functionality
- Project submission


## Project structure
```bash
/EcoGreenU
├── /docs                       # documentation files (class diagram, design choises report, etc.)
├── /src                        # project main folder
|   ├── /assets                 # assets folder (logos, projects thumbnail, etc.)
|   ├── /css                    # css style sheets
|   ├── /js                     # js scripts
|   ├── /pages                  # html/php pages (.php)
|   ├── /php                    # php scripts for backend and server-side logic
|   ├── /shared                 # shared components/files
|   ├── /sql                    # db-related files (SQL commands)
|   |   └── 1-create-tables.sql # CREATE DATABASE & CREATE TABLE queries
|   |   └── 2-insert-into.sql   # INSERTO INTO queries
|   └── index.php               # main page
└── README.md                   # project documentation (the file you reading right now)
```


## Educational Purpose
This project was built with the goal of learning:
- Backend development with **PHP & MySQL**
- Frontend structuring using **HTML/CSS/JS**
- User authentication and session management
- Working with local servers (**XAMPP**)


## Tech Stack
- **PHP** (backend & server-side logic)
- **MySQL** (database)
- **HTML5** & **CSS3** (frontend)
- **JavaScript** (client-side interactivity)
- **XAMPP** (Apache + MySQL)
- **Git** (version control)


## How to Run the Project
1. Clone this repository
2. Place it in your `htdocs` folder (inside XAMPP)
3. Start Apache and MySQL via the XAMPP control panel
4. Import the database via phpMyAdmin, by pasting the queries inside `src/sql/`
5. Navigate to the project directory in your browser


## License
This project is for **educational use only** and not intended for commercial deployment. However, you'll still need my approval to use this project, especially if for lucrative purposes.