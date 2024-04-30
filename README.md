# Library Management System

![Library Management System]( https://github.com/yogeshjangir16/Database-Project/blob/main/Library%20Managment%20System/admin/logo.png)

The Library Management System is a web-based application developed to manage the day-to-day operations of a library. The system allows users to browse through available books, search for books, borrow and return books, manage user accounts, and generate reports.

## Features

- **Change Password:** Users can change their passwords.
- **Edit Profile:** Users can update their profile information.
- **Issue Books:** Users can borrow books from the library.
- **View Profile:** Users can view their profile information.

## Technologies Used

- **Backend:** PHP, Python
- **Database:** SQL
- **Frontend:** HTML, CSS
- **Libraries:** Pandas

## Database Schema

### Tables

1. **Admin**
   - name
   - email
   - password
   - mobile

2. **Author**
   - author_id
   - author_name
   - mobile
   - address

3. **Book**
   - book_name
   - author_id
   - category_id
   - book_no
   - book_price

4. **Category**
   - category_id
   - category_name

5. **Issue_Book**
   - sno
   - book_no
   - book_name
   - author_name
   - student_id
   - status
   - issue_date
   - due_date

6. **User**
   - student_id
   - name
   - email
   - password
   - mobile
   - address

## Data Normalization

- The database tables are normalized to minimize redundancy and dependency.
- Redundant data is stored in separate tables and linked through foreign key relationships.

## Data Recovery

- Implemented data recovery mechanisms to ensure data integrity and availability.
- Regular backups are performed to prevent data loss.

## Query Optimization

- Optimized database queries for faster retrieval of data.
- Indexing and proper database design were used to improve query performance.

## Cascading

- Implemented cascading operations to maintain data integrity.
- For instance, when a book is issued, the corresponding status is updated, and the due date is calculated automatically.

## Getting Started

1. Clone the repository:

```bash
git clone https://github.com/your-username/library-management-system.git
