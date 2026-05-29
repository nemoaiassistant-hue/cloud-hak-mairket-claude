# Build a Cloud Hak Landing Page (Mairket Theme Conversion)

Convert the Mairket WordPress agency theme into a static HTML landing page rebranded for **Cloud Hak** (cloud-hak.com). Keep the visual design identical — same palette, typography, layout, animations. Replace all Mairket content with Cloud Hak content.

## Files to Create

- `index.html` — single-page landing site (EN)
- `assets/css/main.css` — full stylesheet
- `assets/js/main.js` — interactions (reveal, smooth scroll, form)
- `assets/img/` — use placeholder images where needed

## Brand: Cloud Hak

Cloud Hak is an AI agency based in Brighton & Hove, UK. We help local businesses grow with modern digital tools — websites, AI chatbots, voice agents, SEO, and automation.

- **Name:** Cloud Hak
- **Tagline:** "AI-powered growth for local business"
- **Based:** Brighton & Hove, England
- **Phone:** +44 1273 000000
- **Email:** hello@cloud-hak.com
- **Hours:** Mon–Fri · 9a–6p BST

## Design System — Apply These EXACT Tokens

### Colors (from Mairket theme — keep identical)
```css
--cream:        #f6f3ed;
--cream-2:      #efeae1;
--cream-3:      #e6e0d4;
--paper:        #fbf9f4;
--ink:          #0a1a3a;
--ink-2:        #1a2a4d;
--ink-3:        #2a3a5d;
--muted:        #5a6378;
--muted-2:      #8a91a3;
--copper:       #c08552;
--copper-2:     #a06a3a;
--champagne:    #d9b97a;
--rule:         rgba(10, 26, 58, 0.10);
--rule-strong:  rgba(10, 26, 58, 0.18);
--live:         #2d8a4a;
--live-soft:    rgba(45,138,74,0.18);
```

### Typography (keep identical)
- **Display:** Fraunces (Google Fonts, serif) — headlines, section titles
- **Body:** Inter (Google Fonts, sans-serif) — body text
- **Mono:** JetBrains Mono (Google Fonts) — labels, tags, terminal, nav links, buttons

### Spacing & Layout (keep identical)
- Max width: 1280px
- Gutter: `clamp(20px, 4vw, 56px)`
- Border radius: 4px / 8px / 14px
- Easing: `cubic-bezier(.2,.7,.2,1)`

## Page Structure — Section by Section

### 1. Status Bar (announce bar)
Thin dark navy bar at top:
- Left: green pulse dot + "Accepting new clients · Q2 2026"
- Right: "Brighton & Hove" · "≤ 1 biz day" · "04 / 12 open"

### 2. Header (sticky)
- Left: Cloud Hak wordmark (Fraunces font, "CH" mark + "Cloud Hak" text)
- Center nav: Services · Approach · Contact (mono, uppercase, 12px)
- Right: phone number (mono, dashed underline)

### 3. Hero Section
**Left side:**
- Eyebrow: `// Cloud Hak · Brighton & Hove`
- H1: `Modern AI solutions` / `for` / `local` (italic copper) / `business.`
- Lede: "We help local businesses grow with intelligent websites, AI chatbots, voice agents, and digital automation — all under one roof."
- Two buttons: "Start a project" (primary) + "See what we do" (ghost)
- Meta row: Based: Brighton & Hove / Working: UK-wide / Response: ≤ 1 biz day

**Right side: Terminal panel**
```
$ ls services/
01  web-design        ● ready
02  seo               ● ready
03  ai-chatbots       ● ready
04  ai-voice          ● ready
05  automation        ● ready
06  content           ● ready

$ status --slots
Quarter   Q2 2026
Open      04 / 12
SLA       ≤ 1 business day
Senior    100%
```

**Below hero:** Marquee strip: Web Design · SEO · AI Chatbots · AI Voice · Automation · Content

### 4. Positioning Section (cream-2 background)
Two-column layout:
- Left: `// What we do` eyebrow
- Right: H2 "We build the digital engine that brings customers to your door." + lede paragraph about Cloud Hak's approach to helping local businesses with AI-first digital solutions.

### 5. Services Section (8 cards in 4-column grid)
Section eyebrow: `// Services`
Section title: "Everything a local business needs to grow online"
Lede: "From your first website to a fully automated lead pipeline, we handle it all."

**8 service cards (each with number, title, description, pills):**

1. **Web Design & Development** — Fast, mobile-first websites that convert visitors into customers. No templates, no bloat. / `WordPress` `GoHighLevel` `Static`
2. **SEO** — Get found on Google when local customers search for what you sell. We focus on calls and bookings, not vanity metrics. / `Local SEO` `Google Business` `Content`
3. **AI Chatbots** — A 24/7 assistant on your website that answers questions, qualifies leads, and books appointments while you sleep. / `Website chat` `WhatsApp` `Custom trained`
4. **AI Voice Agents** — Never miss a call again. AI answers, qualifies, and routes callers to the right place. / `Inbound` `Outbound` `CRM-routed`
5. **Google & Social Ads** — Paid campaigns that actually pay for themselves. We track real revenue, not just clicks. / `Google Ads` `Meta Ads` `Retargeting`
6. **Content & Copy** — Blog posts, landing pages, and emails written to sell — not just fill space. / `Blog posts` `Sales pages` `Email`
7. **Automation** — Connect your tools so leads stop falling through the cracks. Forms, calendars, CRM, and ads all talking to each other. / `Zapier` `GHL` `Workflows`
8. **Analytics & Reporting** — Know exactly what's working and what isn't. Simple dashboards that make sense to business owners. / `Dashboards` `Call tracking` `ROI`

### 6. Approach Section (dark ink background)
Two-column: image left, copy right.
- Eyebrow: `// Our approach`
- Title: "Listen first. Then build what actually moves the needle."
- Lede: "No long contracts, no jargon, no offshore hand-offs. One team, one plan, measurable results."

**4-step approach list (terminal-styled):**
1. `$ 01_discover` — Free 15-minute chat — "We learn about your business, your customers, and where you're losing them."
2. `$ 02_plan` — Written proposal ≤ 3 biz days — "Scope, timeline, fixed price. No surprises."
3. `$ 03_build` — Senior hands on work — "The person you spoke to is the person doing the work."
4. `$ 04_grow` — Measure what matters — "Calls booked, leads generated, revenue grown. Not impressions."

### 7. Intake Form Section (cream-2 background)
- Eyebrow: `// Start a project`
- Title: "Tell us about your business"
- Lede: "Fill in the form and we'll respond within one business day with a clear plan."

**Form fields:**
- Fieldset 1 "About you": First name, Last name, Email, Phone (optional), Company, Website (optional)
- Fieldset 2 "What do you need?": Checkbox grid — Web Design, SEO, AI Chatbot, AI Voice Agent, Google/Social Ads, Content & Copy, Automation, Analytics, Not sure yet
- Fieldset 3 "The project": Project description (textarea), Budget range (Under £2k / £2k–£5k / £5k–£10k / £10k–£25k / £25k+ / Monthly retainer / Not sure), Timeline (ASAP / 2–4 weeks / 1–3 months / Just exploring), How did you hear about us?
- Honeypot field (hidden)
- Submit: "Send the brief"

### 8. Contact Strip (dark ink background)
Two columns:
- Left: "Prefer to skip the form?" + "Let's talk about your business."
- Right: Phone / Email / Hours

### 9. Footer (dark ink)
- Ops bar: green dot + "All systems operational" · "Last deploy: May 2026" · "Build v1.0"
- 4-column grid:
  - Col 1: CH logo + "AI-powered growth for local businesses in Brighton, Hove, and across the UK."
  - Col 2 "Services": Web Design, SEO, AI Chatbots, AI Voice, Ads, Automation
  - Col 3 "Company": About, Approach, Contact, Privacy
  - Col 4 "Connect": Phone, Email, WhatsApp
- Bottom: "© 2026 Cloud Hak" left · "// Built with AI, delivered by humans." right

## CRITICAL RULES

1. **Static HTML only** — no PHP, no WordPress, no server-side code. Pure HTML + CSS + JS.
2. **Single `index.html`** — all sections on one page.
3. **Form is front-end only** — no form handler. Show a success message on submit (JS only).
4. **Keep ALL CSS** — use the exact same selectors, animations, and responsive breakpoints as the Mairket theme. Copy the full CSS from the reference files.
5. **Reveal animations** — `.reveal` elements start at `opacity: 0; transform: translateY(12px)` and animate in via IntersectionObserver.
6. **Sticky header** with frosted glass effect (`backdrop-filter: blur`).
7. **Blinking caret** on last word of hero headline.
8. **Green pulse dot** animation on status bar and footer.
9. **Mobile responsive** — at 1024px and 720px breakpoints (same as Mairket).
10. **Google Fonts** loaded via `<link>` tag: Fraunces, Inter, JetBrains Mono (all weights: 400, 500, 600).
11. **No external dependencies** — no jQuery, no Tailwind, no CDN CSS frameworks. Vanilla JS only.
12. **SEO basics** — proper `<title>`, `<meta description>`, Open Graph tags, JSON-LD schema for LocalBusiness.
13. **Use £ (GBP)** for all prices — Cloud Hak is a UK company.
14. **Terminal panel** in hero must have the exact same visual style (dots bar, monospace font, $ prompts, green ready dots).
15. **Service pills** use the same pill style (mono, uppercase, rounded-full border).
16. **All buttons** have an `→` arrow after text that slides on hover.
17. **Hero marquee** has dot separators between items.

## Reference Files

The following reference files from the Mairket theme are available in this directory:
- `ref-front-page.php` — full HTML structure of all sections
- `ref-main.css` — complete CSS (993 lines)
- `ref-main.js` — JS interactions (reveal, form, smooth scroll)
- `ref-hero.png` — hero image asset
- `ref-process-still.png` — approach section image

Read ALL reference files first, then build the page preserving their exact visual design while substituting Cloud Hak content.
