# Agent Instructions

## Standing rules

Each rule names the check that enforces it. Checks run in `.github/workflows/guardrails.yml`; guardrail tests live in `tests/Feature/Guardrails`.

| Rule | Check |
| --- | --- |
| Open PRs as drafts. Andy reviews and merges; never mark ready or merge yourself. | Review |
| No `[DO NOT MERGE]` or similar in PR titles. Use a draft instead. | Review |
| Never invent numbers or claims about Andy's work (years, project counts, results, testimonials). Every claim needs Andy's OK; record approved text with its source in `guardrailApprovedClaims()`. | `MarketingClaimsTest` |
| Job-application pages and test fixtures are `noindex, nofollow`; only the homepage is indexable. | `PagesTest` |
| Pages must render without live HTTP calls in tests (fake the RSS feeds). | `PagesTest` |
| GA4 only. No Umami or Plausible. | `AnalyticsTest` |
| New PHP passes Larastan level 8. Shrink `phpstan-baseline.neon` when you touch a file; never regenerate it to hide new errors. | `vendor/bin/phpstan analyse` |
| Bring a branch up to date by merging `main`. Never force-push or rewrite pushed history. | Review |
