# GrafiCalamar – PHP E-commerce Demo

Small e-commerce application built from scratch using PHP and MySQL, focused on clean structure, classic backend architecture, and framework-free development.

## Tech Stack

- PHP 8
- MySQL
- JavaScript (Fetch API)
- HTML / CSS
- Apache (.htaccess + mod_rewrite)

## Features

- User registration and login (PHP sessions)
- Persistent shopping cart
- Product listing from database
- Custom API for cart and authentication
- WhatsApp checkout (demo)

## Architecture

- `public/` as the single web entry point
- `src/` contains application logic
- Web routing via Front Controller (`index.php`)
- API endpoints served directly from `/api`
- Services separated from presentation layer

## Project Structure

- `/public` → Frontend, assets and API
- `/src` → Business logic (services, pages, config)
- `/.env.example` → Environment variables example

## Setup

1. Clone the repository
2. Create a `.env` file based on `.env.example`
3. Configure the MySQL database
4. Set Apache DocumentRoot to `public/`

## Notes

This project was developed for a real business owned by the author and is used in production.

## Licence

This project uses GNU license.
