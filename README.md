# WordPress on Netlify — CI/CD Setup

A production-ready Git repo structure for hosting a WordPress site on Netlify with an automated CI/CD pipeline via GitHub Actions.

---

## 🗂 Repository Structure

```
├── .github/
│   └── workflows/
│       └── deploy.yml        # GitHub Actions CI/CD pipeline
├── scripts/
│   ├── build.sh              # Main build script (runs on Netlify & locally)
│   └── deploy.sh             # Local deploy helper (uses Netlify CLI)
├── wp-content/
│   ├── themes/               # Your custom theme(s) go here
│   └── plugins/              # Your plugins go here
├── netlify.toml              # Netlify configuration & redirects
├── package.json              # Node dependencies & scripts
└── .gitignore
```

---

## 🚀 First-Time Setup

### 1. Create the GitHub Repo

```bash
git init
git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO.git
git add .
git commit -m "Initial commit"
git push -u origin main
```

### 2. Connect to Netlify

1. Go to [app.netlify.com](https://app.netlify.com) → **Add new site → Import an existing project**
2. Select **GitHub** and choose this repo
3. Build settings are auto-detected from `netlify.toml`
4. Click **Deploy site**

### 3. Add GitHub Secrets

In your GitHub repo → **Settings → Secrets and variables → Actions**, add:

| Secret | Where to find it |
|---|---|
| `NETLIFY_AUTH_TOKEN` | Netlify → User Settings → Applications → Personal access tokens |
| `NETLIFY_SITE_ID` | Netlify → Site → Site configuration → Site ID |

---

## 🔄 CI/CD Pipeline

| Trigger | Branch | Action |
|---|---|---|
| Push | `main` | Lint → Build → **Deploy to Production** |
| Push | `staging` | Lint → Build → Deploy to staging preview |
| Pull Request | any → `main` | Lint → Build → Deploy preview → Comment URL on PR |
| Manual | any | Via GitHub Actions "Run workflow" button |

---

## 💻 Local Development

```bash
# Install dependencies
npm install

# Build the theme assets
npm run build

# Deploy a preview
npm run deploy

# Deploy to production
npm run deploy:prod
```

---

## 🔌 WordPress Static Export

This setup works best with a **headless or statically-exported WordPress**. Two recommended plugins:

- **Simply Static** — exports your entire WordPress site as static HTML into `/static-export/`
- **WP2Static** — similar, with CDN-direct upload support

After installing one of these plugins:
1. Configure it to export to the `/static-export/` directory
2. The `build.sh` script will automatically copy those files to `dist/`

---

## 🌐 WordPress Backend (Headless)

If running WordPress headlessly (REST API / WPGraphQL):

1. Host your WordPress backend separately (e.g. WP Engine, Kinsta, or a VPS)
2. Update `netlify.toml` redirects to point to your backend URL:

```toml
[[redirects]]
  from   = "/wp-json/*"
  to     = "https://YOUR-WP-BACKEND.com/wp-json/:splat"
  status = 200
  force  = true
```

---

## 🔐 Environment Variables

Set these in **Netlify → Site → Environment variables** for production, and in **GitHub Secrets** for CI:

| Variable | Description |
|---|---|
| `WP_API_URL` | Your WordPress REST API base URL |
| `WP_USERNAME` | WP username (for authenticated requests) |
| `WP_APP_PASSWORD` | WP Application Password |

---

## 📄 Branch Strategy

```
main      ← production (auto-deploys to live site)
staging   ← staging (auto-deploys to staging URL)
feature/* ← PR previews (each PR gets a unique preview URL)
```
