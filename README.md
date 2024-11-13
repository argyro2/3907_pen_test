# Detection and mitigation of SQL vulnerabilities
## Project Overview
This repository is a companion to my thesis on web application security, providing practical examples of common vulnerabilities and security measures.

## Contents
- **SQL Injection Based on User Input**
- **Error-Based SQL Injection** 
- **Union-Based SQL Injection** 
- **Second-Order SQL Injection**
- **HTTP Header Injection**
- **Cookie-Based Injection** 

## Setup Instructions
### Prerequisites
- Install [XAMPP](https://www.apachefriends.org/) or configure a PHP/MySQL environment.

### Database Setup
1. Create databases and tables using the provided SQL scripts in the `/databases` folder.
2. Update database connection settings in `config.php`.

### Running the Example: Error-Based SQL Injection

Navigate to the Vulnerable Page
Open error_based.php in your browser. This page includes a vulnerable SQL query that can be exploited using error-based injection techniques.

Input Malicious Query
In the input field, enter the following payload:

    1' AND 1=1 --

This input is designed to modify the SQL query structure, exploiting the application’s error-handling to reveal database details.

Observe Error Message

 After submitting the form, check the response for any error message that exposes information about the database or query structure. Error-based SQL injection works by intentionally triggering SQL errors that may disclose database schema or other sensitive information in the error output.
