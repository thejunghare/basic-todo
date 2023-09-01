# Basic Todo Application

This is a simple Todo application built using PHP and SQL. It allows users to create, read, update, and delete tasks in a to-do list.

## Features

- Create new tasks with a title and description.
- View the list of tasks.
- Update task details.
- Mark tasks as complete.
- Delete tasks.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP installed on your web server.
- A MySQL database set up with a user and credentials.
- Basic knowledge of PHP and SQL.

CREATE TABLE `todos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `task` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `due_date` DATE,
    `completed` BOOLEAN NOT NULL DEFAULT false,
    INDEX `idx_completed` (`completed`)
) ENGINE=InnoDB;


## Installation

1. Clone this repository to your web server directory:

   ```bash
   git clone https://github.com/your-username/todo-app-php-sql.git
