#!/usr/bin/env bash
# =============================================================================
#  build.sh  –  WordPress static export for Netlify
# =============================================================================
set -euo pipefail

ENV="production"
while [[ $# -gt 0 ]]; do
  case $1 in
    --env) ENV="$2"; shift 2 ;;
    *)     shift ;;
  esac
done

echo "▶ Building WordPress site for environment: $ENV"

# ── 1. Install dependencies ──────────────────────────────────────────────────
if [ -f "package.json" ]; then
  echo "▶ Installing Node dependencies..."
  npm ci --prefer-offline
fi

if [ -f "composer.json" ]; then
  echo "▶ Installing Composer dependencies..."
  composer install --no-dev --optimize-autoloader
fi

# ── 2. Build theme assets ────────────────────────────────────────────────────
if [ -f "package.json" ] && grep -q '"build"' package.json; then
  echo "▶ Compiling theme assets..."
  if [ "$ENV" = "production" ]; then
    npm run build
  else
    npm run build:dev
  fi
fi

# ── 3. Export static files ───────────────────────────────────────────────────
echo "▶ Exporting static site..."
mkdir -p dist

# Copy compiled theme assets
[ -d "wp-content/themes" ] && cp -r wp-content/themes dist/ || true
[ -d "wp-content/uploads" ] && cp -r wp-content/uploads dist/ || true
[ -d "wp-content/plugins" ] && cp -r wp-content/plugins dist/ || true

# If using a static export plugin (e.g. Simply Static) copy its output
if [ -d "static-export" ]; then
  cp -r static-export/. dist/
fi

# Copy any pre-built HTML/assets from public/
[ -d "public" ] && cp -r public/. dist/ || true

# ── 4. Inject environment banner (staging only) ──────────────────────────────
if [ "$ENV" != "production" ]; then
  echo "▶ Injecting staging banner..."
  find dist -name "*.html" -exec sed -i \
    's|</body>|<div style="position:fixed;bottom:0;left:0;width:100%;background:#e53e3e;color:#fff;text-align:center;padding:6px;font-size:13px;z-index:9999">⚠ STAGING ENVIRONMENT</div></body>|g' \
    {} \;
fi

echo "✅ Build complete → dist/"
