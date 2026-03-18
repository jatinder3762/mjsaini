# mjsaini Website Platform

Professional monorepo structure for a developer website with portfolio, blog posts, and social publishing integrations.

## Repository Structure

- `backend/` Laravel application (API, admin panel, auth, database, social publishing jobs)
- `frontend/` Frontend app workspace (to be scaffolded)
- `docs/setup/` Local setup and virtual host guides
- `docs/tracking/` Build tracking logs (commands and file changes)
- `index_portfolio_legacy.php` Legacy one-page portfolio backup

## Development Plan

1. Build backend modules in Laravel (`backend/`): auth, posts, portfolio, comments, moderation.
2. Build frontend in a dedicated app (`frontend/`) and connect to backend APIs.
3. Add social integrations as queue jobs (LinkedIn, X, Facebook, Instagram).
4. Keep one commit per feature/page and log every major command/file change under `docs/tracking`.

## Local Run (Current)

This project should run via Apache virtual host that points directly to:

`C:/wamp64/www/mjsainidotcom/backend/public`

See: `docs/setup/VIRTUAL_HOST_SETUP.md`

## Commit Discipline

Use one commit per feature/page, for example:

- `feat(auth): add login and registration pages`
- `feat(posts): add create post with markdown`
- `feat(portfolio): add list and detail pages`
- `chore(docs): update setup and tracking logs`
