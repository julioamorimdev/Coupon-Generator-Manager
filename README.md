# Coupon Generator Manager

A comprehensive web-based platform for generating and managing promotional coupons according to promotion regulations and ERP integration.

## 🚀 Features

- **User Authentication**: Secure login system for administrators
- **Coupon Management**: Create, view, and manage promotional coupons
- **Admin Panel**: Complete administrative interface for system management
- **Responsive Design**: Modern UI with Bootstrap 5 integration
- **Database Integration**: MySQL database for data persistence
- **Security**: Password encryption and SQL injection protection

## 📋 Prerequisites

Before running this application, make sure you have the following installed:

- **PHP** (version 7.4 or higher)
- **MySQL** (version 5.7 or higher)
- **Web Server** (Apache/Nginx)
- **Node.js** (for frontend dependencies)

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd Coupon-Generator-Manager
   ```

2. **Install frontend dependencies**
   ```bash
   npm install
   ```

3. **Database Setup**
   - Create a MySQL database
   - Copy the database configuration example:
     ```bash
     cp includes/db.example.php includes/db.php
     ```
   - Edit `includes/db.php` with your database credentials:
     ```php
     $con = mysqli_connect("localhost","your_username","your_password","your_database_name");
     ```

4. **Database Schema**
   - Import the required database tables (see Database Schema section below)

5. **Web Server Configuration**
   - Point your web server to the project directory
   - Ensure PHP has write permissions for the application

## 🗄️ Database Schema

The application requires the following MySQL tables:

### Admins Table
```sql
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
);
```

### Additional tables for coupon management should be created based on your specific requirements.

## 📁 Project Structure

```
Coupon-Generator-Manager/
├── class/                    # PHP classes
│   ├── class.administradores.php
│   ├── class.chamados.php
│   ├── class.nivel_permissao.php
│   └── class.usuarios.php
├── css/                      # Stylesheets
│   ├── bootstrap.css
│   ├── login.css
│   └── style.css
├── includes/                 # PHP includes
│   ├── auth.php             # Authentication logic
│   ├── db.example.php       # Database config example
│   └── db.php              # Database config (not in repo)
├── js/                      # JavaScript files
│   └── login.js
├── index.php               # Login page
├── inicio.php              # Dashboard
├── cupons.php              # Coupon management
├── admins.php              # Admin management
├── menu.php                # Navigation menu
├── register.php            # User registration
├── logout.php              # Logout functionality
├── package.json            # Node.js dependencies
└── README.md               # This file
```

## 🔧 Configuration

### Environment Variables
The application uses a simple PHP configuration approach. For production environments, consider using environment variables:

1. Create a `.env` file (not tracked in git)
2. Use a library like `vlucas/phpdotenv` to load environment variables
3. Update the database connection to use environment variables

### Security Considerations
- Change default passwords
- Use HTTPS in production
- Implement proper session management
- Consider using prepared statements for all database queries
- Implement rate limiting for login attempts

## 🚀 Usage

1. **Access the application**
   - Navigate to `http://your-domain/index.php`

2. **Login**
   - Use the admin credentials configured in the database

3. **Manage Coupons**
   - Access the coupon management interface
   - Create, edit, and delete promotional coupons

4. **Admin Management**
   - Manage system administrators
   - Configure user permissions

## ��️ Security Features

- **Password Encryption**: Uses MD5 hashing (consider upgrading to bcrypt)
- **SQL Injection Protection**: Uses `mysqli_real_escape_string()`
- **Session Management**: PHP session-based authentication
- **Input Validation**: Server-side validation for all inputs

## 🔄 Development

### Adding New Features
1. Create new PHP files in the appropriate directory
2. Update the menu navigation if needed
3. Follow the existing code patterns and security practices
4. Test thoroughly before deployment

### Code Style
- Follow PSR-4 autoloading standards
- Use meaningful variable and function names
- Add comments for complex logic
- Maintain consistent indentation

## 📦 Dependencies

### Frontend
- **Bootstrap**: ^5.3.0-alpha1 (UI framework)

### Backend
- **PHP**: 7.4+ (Server-side scripting)
- **MySQL**: 5.7+ (Database)

## 🐛 Troubleshooting

### Common Issues

1. **Database Connection Error**
   - Verify database credentials in `includes/db.php`
   - Ensure MySQL service is running
   - Check database permissions

2. **Permission Denied**
   - Ensure web server has read/write permissions
   - Check file ownership

3. **Page Not Found**
   - Verify web server configuration
   - Check if mod_rewrite is enabled (if using URL rewriting)

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Support

For support and questions:
- Create an issue in the repository
- Contact the development team
- Check the documentation

## 🔄 Version History

- **v1.0.0**: Initial release with basic coupon management functionality
- **v1.1.0**: Added admin management features
- **v1.2.0**: Improved security and UI enhancements

---

**Note**: This is a development platform for coupon generation according to promotion regulations and ERP integration. Ensure compliance with local regulations and business requirements before deployment in production environments.
