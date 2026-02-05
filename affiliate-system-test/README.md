AFFILIATE PAYOUT SYSTEM (PHP + MYSQLI)
====================================

Project Description
-------------------
This project implements a multi-level affiliate payout system using Core PHP.

The system manages a user hierarchy and distributes affiliate commissions
up to 5 levels when a sale is made by a user at the 6th level or below.

Commission distribution rules:
- Level 1 (Direct Parent): 10%
- Level 2: 5%
- Level 3: 3%
- Level 4: 2%
- Level 5: 1%
- Level 6 and beyond: No commission


Technology Stack
----------------
- PHP (Core PHP)
- MySQLi (Procedural)
- MySQL
- HTML
- CSS


Project Structure
-----------------
affiliate-system/
│
├── config.php            (MySQLi database connection)
├── index.php             (Main page)
│
├── assets/css/
│   └── style.css             (CSS styling)
│
├── functions/
│   ├── add_user.php       (Add affiliate user)
│   ├── add_sale.php       (Sale entry & commission distribution)
│   └── switch_users.php       (Switch active user)
│
├── views/
│   ├── current_user.php       (Current user details)
│   ├── user_list.php        (All users list)
│   ├── sales_list.php     (Sales list)
│   └── total_commission.php (Final commission & balance summary)


Database Setup
--------------
1. Create database:
   CREATE DATABASE affiliate_db;
   USE affiliate_db;

2. Tables used:
   - users
   - sales
   - payouts

3. Root user (Admin):
   INSERT INTO users (name, parent_id) VALUES ('Admin', NULL);

User with ID = 1 is the root of the affiliate tree.


How the System Works
--------------------
1. Users are added under a selected parent user.
2. Each user has a parent_id, creating a multi-level hierarchy.
3. When a sale is recorded:
   - The seller receives the full sale amount.
   - Commission is distributed upward to parent users.
4. Commission is limited strictly to 5 levels.
5. All commissions are stored in the payouts table.
6. User balance is updated in the users table.


How to Run the Project
----------------------
1. Copy the project folder into:
   htdocs (XAMPP) or www (WAMP)
2. Import the database into MySQL.
3. Update database credentials in config.php.
4. Open browser and visit:
   http://localhost/affiliate-system/index.php


How to Test
-----------
1. Create users to form at least 6 levels.
2. Switch the active user.
3. Add a sale for a user at level 6 or below.
4. Verify:
   - Seller receives full sale amount.
   - Parent users up to 5 levels receive commission.
   - No commission beyond level 5.
5. View final commission & balance summary table.


Author
------
Developed as part of a PHP Machine Test Aleena Jacob
