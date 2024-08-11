# thoriumCMS
# 🍺 Brew:Track - Your Ultimate Beverage Merchandising Solution

## 🌟 Introduction

Welcome to **Brew:Track**, the cutting-edge web application designed to revolutionize how beverage merchandisers track store products, manage check-in/out times, and document beverage stock with photos. Built with Laravel 11, Brew:Track offers a robust, user-friendly platform that streamlines your merchandising operations and boosts productivity.

> 🤖 **AI-Powered Development**: Brew:Track harnesses the power of artificial intelligence, with 90% of its codebase crafted through AI assistance. This innovative approach has allowed us to create a highly efficient, feature-rich application in record time.

## 🚀 Features

- **Store Management**: Easily add, edit, and manage store information.
- **Product Tracking**: Keep tabs on product placement, stock levels, and pricing accuracy.
- **Check-In/Out System**: Track merchandiser visits with precise timing.
- **Photo Documentation**: Capture and store photos of beverage displays for visual reference.
- **User Roles**: Admin and user roles for tailored access and functionality.
- **Responsive Design**: Access Brew:Track on any device, from desktop to mobile.

## 🛠 Technology Stack

- **Backend**: Laravel 11
- **Database**: MySQL
- **Frontend**: Blade templates with Bootstrap for responsive design
- **Authentication**: Laravel's built-in authentication system

## 📦 Installation

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/brew-track.git
   ```
2. Navigate to the project directory:
   ```
   cd brew-track
   ```
3. Install dependencies:
   ```
   composer install
   npm install && npm run dev
   ```
4. Set up your environment file:
   ```
   cp .env.example .env
   ```
5. Generate application key:
   ```
   php artisan key:generate
   ```
6. Configure your database in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE="your_database_name"
   DB_USERNAME="your_username"
   DB_PASSWORD="your_password"
   ```
7. Run migrations:
   ```
   php artisan migrate
   ```
8. Seed the database (optional):
   ```
   php artisan db:seed
   ```

## 🚀 Getting Started

1. Start your local development server:
   ```
   php artisan serve
   ```
2. Visit `http://localhost:8000` in your browser.
3. Register a new account or log in with the default admin credentials:
   - Email: admin@example.com
   - Password: password

## 🌈 Usage

### For Merchandisers:
- Log in to your account
- View assigned stores
- Check-in at a store location
- Update product information and stock levels
- Upload photos of displays
- Check-out when leaving the store

### For Administrators:
- Manage user accounts
- Add or edit store information
- View comprehensive reports
- Monitor merchandiser activities

## 🤝 Contributing

We welcome contributions to Brew:Track! If you have suggestions for improvements or encounter any issues, please feel free to open an issue or submit a pull request.

## 📄 License

Brew:Track is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🙏 Acknowledgements

- Laravel Framework
- Bootstrap
- Our amazing team of beta testers
- The power of AI in accelerating development

---

Brew:Track: Elevating beverage merchandising through AI-assisted innovation. Join us in revolutionizing the industry, one store at a time! 🚀🍻
