# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0-production] - 2026-09-28

### Fixed
- **Critical:** Fixed `$tabel` typo in `app/Models/Customer.php` - was `$tabel`, now correctly `$table`
- **Critical:** Fixed Post table name casing in `app/Models/Post.php` - changed from `'Posts'` to `'posts'` for MySQL production compatibility on Linux servers
- **Security:** Fixed unsafe file deletion in `PostsController::deletepost()` - now checks file existence before attempting to delete
- **Security:** Improved admin middleware access control - changed from hardcoded `user->id !== 1` check to proper `user->type === 'Admin'` check with error message

### Added
- **Validation:** Added comprehensive input validation to `PostsController::storepost()`:
  - Image: required, must be valid image, accepted formats (jpeg, png, gif, webp), max 5MB
  - Title: required, string, max 255 characters
  - Description: required, string, max 1000 characters
  - Date: required, valid date format
- **Validation:** Added validation to `PostsController::updatepost()` with same rules as create
- **Documentation:** Added `PRODUCTION_CHECKLIST.md` with deployment guide and remaining tasks
- **Documentation:** Added `CHANGELOG.md` to track version history
- **Config:** Updated `.env.example` for production:
  - Changed `APP_ENV` from `local` to `production`
  - Changed `APP_DEBUG` from `true` to `false`
  - Changed `APP_URL` to template for production domain
  - Changed `DB_CONNECTION` from `sqlite` to `mysql` with default connection params
  - Changed `MAIL_MAILER` from `log` to `smtp` with Mailtrap defaults
  - Updated `LOG_LEVEL` from `debug` to `notice`

### Improved
- **Error Handling:** Added `@` suppression operator to `unlink()` calls for graceful file deletion failures
- **Security:** Admin middleware now returns proper 403 error message instead of silent redirect
- **File Upload:** Increased validation file size limit to 5120 KB (5MB) for better clarity

### Security
- Fixed potential authorization bypass using hardcoded user ID
- Added proper mime type validation for uploaded images
- Added file existence checks before all file operations
- Changed debug mode default to off in production config

### Known Limitations
- Posts table does not yet have `user_id` foreign key (tracks who created post)
- File uploads still stored in public directory (not using Laravel storage)
- No rate limiting on post/comment/like endpoints yet
- Admin check still uses string comparison instead of boolean flag
- Tests are skeleton only, no real feature tests yet

## [0.1.0] - Initial Release

### Added
- Initial Laravel 12 project setup
- User authentication with email verification
- Admin appointment booking system
- Post creation and management
- Comment system on posts
- Like/upvote system for posts
- Admin notifications
- Blade templating with Bootstrap styling
- Database migrations for core models
