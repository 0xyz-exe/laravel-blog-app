# Blog Laravel

Complete blogging platform with public-facing blog and admin dashboard for content management.

Repository: https://github.com/0xyz-exe/laravel-blog-app

## Screenshots

### Public Blog Homepage
![Blog homepage](docs/screenshots/01_blog_home.png)

### Single Post Article View
![Single post](docs/screenshots/02_post_view.png)

### Admin Posts Management Dashboard
![Admin posts](docs/screenshots/03_admin_posts.png)

### Post Editor & Draft Workflow
![Post editor](docs/screenshots/04_post_editor.png)

### Authentication
![Authentication](docs/screenshots/05_login.png)

## Features

- ✅ Public blog homepage
- ✅ Post listing with pagination
- ✅ Single post pages with SEO-friendly slugs
- ✅ Categories with post counts
- ✅ Category filtering
- ✅ Admin dashboard for post management
- ✅ Create, edit, delete posts
- ✅ Draft, published, archived statuses
- ✅ Automatic slug generation
- ✅ Author attribution
- ✅ Excerpt support
- ✅ Publish date tracking
- ✅ User authentication (Breeze)
- ✅ Authorization policies

## Tech Stack

- Laravel 13.38.0
- Laravel Breeze
- PHP 8.5.0
- SQLite
- Tailwind CSS

## Installation

```bash
git clone https://github.com/0xyz-exe/laravel-blog-app.git
cd laravel-blog-app
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
npm run build
php artisan serve
```

## Demo Account

- Email: demo@example.com
- Password: password

## Database Schema

**categories:**
- id, name, slug, description

**posts:**
- id, user_id, category_id, title, slug, excerpt, content
- status (draft/published/archived)
- published_at, created_at, updated_at

## Features Detail

### Public Blog
- Homepage with latest published posts
- Category sidebar with post counts
- Single post view with author and date
- SEO-friendly URLs using slugs
- Responsive design

### Admin Dashboard
- Manage all your posts
- Create new posts with rich content
- Draft system for unpublished content
- Edit and delete posts
- Status management (draft/published/archived)
- Category assignment

### Publishing Workflow
1. Create post as draft
2. Edit and preview
3. Publish when ready
4. Archive old content

## Routes

**Public:**
- `/` - Blog homepage
- `/post/{slug}` - Single post
- `/category/{slug}` - Category archive

**Admin (auth required):**
- `/posts` - Manage posts
- `/posts/create` - New post
- `/posts/{post}/edit` - Edit post

## Security

- CSRF protection
- SQL injection prevention
- Authorization policies (user can only edit own posts)
- XSS protection via Blade escaping
- Status validation
- Slug uniqueness

## Repository

https://github.com/0xyz-exe/laravel-blog-app
