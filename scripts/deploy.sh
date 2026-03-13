#!/usr/bin/env bash
# =============================================================================
#  deploy.sh  –  Manual deploy helper (wraps Netlify CLI)
# =============================================================================
set -euo pipefail

PROD=false
while [[ $# -gt 0 ]]; do
  case $1 in
    --prod|-p) PROD=true; shift ;;
    *)         shift ;;
  esac
done

command -v netlify >/dev/null 2>&1 || { echo "❌ Netlify CLI not found. Run: npm i -g netlify-cli"; exit 1; }

echo "▶ Running build first..."
bash scripts/build.sh

if $PROD; then
  echo "🚀 Deploying to PRODUCTION..."
  netlify deploy --prod --dir=dist
else
  echo "🔍 Deploying PREVIEW..."
  netlify deploy --dir=dist
fi
