<?php
/**
 * Front Page — single-page site
 *
 * @package Mairket
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

// Pull all editable copy from Customizer
$hero_eyebrow    = mkt_mod( 'mkt_hero_eyebrow' );
$hero_pre        = mkt_mod( 'mkt_hero_title_pre' );
$hero_mid        = mkt_mod( 'mkt_hero_title_mid' );
$hero_em         = mkt_mod( 'mkt_hero_title_em' );
$hero_post       = mkt_mod( 'mkt_hero_title_post' );
$hero_lede       = mkt_mod( 'mkt_hero_lede' );
$hero_based      = mkt_mod( 'mkt_hero_meta_based' );
$hero_working    = mkt_mod( 'mkt_hero_meta_working' );
$hero_response   = mkt_mod( 'mkt_hero_meta_response' );
$hero_slots      = mkt_mod( 'mkt_hero_slots_value' );
$phone           = mkt_mod( 'mkt_phone' );
$phone_href      = mkt_tel_href( $phone );
$email           = mkt_mod( 'mkt_email' );
$hours           = mkt_mod( 'mkt_hours' );

// Check for transient submission result (classic POST fallback)
$intake_msg     = '';
$intake_msg_cls = '';
if ( isset( $_GET['submitted'] ) ) {
    $key = 'mkt_intake_' . md5( ( $_SERVER['REMOTE_ADDR'] ?? '' ) . wp_get_session_token() );
    $res = get_transient( $key );
    if ( $res ) {
        $intake_msg     = $res['message'];
        $intake_msg_cls = $res['success'] ? 'success' : 'error';
        delete_transient( $key );
    }
}
?>

<main id="top">

<!-- ============== HERO ============== -->
<section class="hero">
  <div class="container hero-grid">
    <div class="hero-copy">
      <p class="eyebrow reveal"><?php echo esc_html( $hero_eyebrow ); ?></p>
      <h1 class="hero-title reveal">
        <?php echo esc_html( $hero_pre ); ?><br />
        <?php echo esc_html( $hero_mid ); ?> <em><?php echo esc_html( $hero_em ); ?></em><br />
        <span class="caret"><?php echo esc_html( $hero_post ); ?></span>
      </h1>
      <p class="hero-lede reveal">
        <?php echo esc_html( $hero_lede ); ?>
      </p>
      <div class="hero-actions reveal">
        <a href="#intake" class="btn btn-primary btn-lg">Start a project</a>
        <a href="#services" class="btn btn-ghost btn-lg">See what we do</a>
      </div>
      <ul class="hero-meta reveal" role="list">
        <li><span class="meta-k">Based</span><span class="meta-v"><?php echo esc_html( $hero_based ); ?></span></li>
        <li><span class="meta-k">Working</span><span class="meta-v"><?php echo esc_html( $hero_working ); ?></span></li>
        <li><span class="meta-k">Response</span><span class="meta-v"><?php echo esc_html( $hero_response ); ?></span></li>
      </ul>
    </div>

    <aside class="hero-terminal reveal" aria-label="Studio capabilities">
      <div class="term-bar">
        <span class="term-bar-dots" aria-hidden="true"><i></i><i></i><i></i></span>
        <span>mairket — studio.sh</span>
      </div>
      <div class="term-body">
        <div class="term-line"><span class="term-prompt">$</span><span class="term-cmd">ls services/</span></div>
        <span class="term-out"><b>01</b>&nbsp;&nbsp;web-design &nbsp;&nbsp;&nbsp; <span class="term-ok">&#9679; ready</span></span>
        <span class="term-out"><b>02</b>&nbsp;&nbsp;seo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="term-ok">&#9679; ready</span></span>
        <span class="term-out"><b>03</b>&nbsp;&nbsp;aeo-ai-search&nbsp;&nbsp; <span class="term-ok">&#9679; ready</span></span>
        <span class="term-out"><b>04</b>&nbsp;&nbsp;google-ads &nbsp;&nbsp;&nbsp;&nbsp; <span class="term-ok">&#9679; ready</span></span>
        <span class="term-out"><b>05</b>&nbsp;&nbsp;meta-ads &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="term-ok">&#9679; ready</span></span>
        <span class="term-out"><b>06</b>&nbsp;&nbsp;content-copy &nbsp;&nbsp; <span class="term-ok">&#9679; ready</span></span>
        <span class="term-out"><b>07</b>&nbsp;&nbsp;ai-voice &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="term-ok">&#9679; ready</span></span>
        <span class="term-out"><b>08</b>&nbsp;&nbsp;ai-chat-auto &nbsp;&nbsp; <span class="term-ok">&#9679; ready</span></span>
        <div class="term-line" style="margin-top:10px;"><span class="term-prompt">$</span><span class="term-cmd">status --slots</span></div>
        <div class="term-status">
          <span class="lbl">Quarter</span><span class="val">Q3 2026</span>
          <span class="lbl">Open</span><span class="val accent"><?php echo esc_html( $hero_slots ); ?></span>
          <span class="lbl">SLA</span><span class="val">&le; 1 business day</span>
          <span class="lbl">Senior on work</span><span class="val">100%</span>
        </div>
      </div>
    </aside>
  </div>

  <div class="container hero-marquee" aria-label="Capabilities at a glance">
    <span>Web Design</span><span aria-hidden="true">·</span>
    <span>SEO</span><span aria-hidden="true">·</span>
    <span>AEO</span><span aria-hidden="true">·</span>
    <span>Google Ads</span><span aria-hidden="true">·</span>
    <span>Meta Ads</span><span aria-hidden="true">·</span>
    <span>Content</span><span aria-hidden="true">·</span>
    <span>AI Voice</span><span aria-hidden="true">·</span>
    <span>AI Chat</span><span aria-hidden="true">·</span>
    <span>Automation</span>
  </div>
</section>

<!-- ============== POSITIONING ============== -->
<section class="section section-positioning">
  <div class="container two-col">
    <div class="col-label">
      <p class="eyebrow">What we do</p>
    </div>
    <div class="col-body">
      <h2 class="display-title reveal">
        <?php echo esc_html( mkt_mod( 'mkt_pos_title' ) ); ?>
      </h2>
      <p class="lede reveal">
        <?php echo esc_html( mkt_mod( 'mkt_pos_lede' ) ); ?>
      </p>
    </div>
  </div>
</section>

<!-- ============== SERVICES ============== -->
<section class="section section-services" id="services">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow reveal">Services</p>
      <h2 class="section-title reveal"><?php echo esc_html( mkt_mod( 'mkt_services_title' ) ); ?></h2>
      <p class="lede centered reveal"><?php echo esc_html( mkt_mod( 'mkt_services_lede' ) ); ?></p>
    </div>

    <ul class="services-grid" role="list">

      <li class="service-card reveal">
        <div class="service-num" data-tag="web">01 &mdash;</div>
        <h3>Web Design &amp; Development</h3>
        <p>Conversion-led custom sites on WordPress or GoHighLevel. Editorial typography, fast page weight, structured data baked in. Never a template.</p>
        <ul class="service-pills" role="list">
          <li>WordPress</li><li>GoHighLevel</li><li>Webflow</li>
        </ul>
      </li>

      <li class="service-card reveal">
        <div class="service-num" data-tag="seo">02 &mdash;</div>
        <h3>SEO</h3>
        <p>Technical SEO, topical authority builds, and link earning. We focus on commercial-intent keywords that move revenue, not vanity rankings.</p>
        <ul class="service-pills" role="list">
          <li>Technical audits</li><li>Content clusters</li><li>Authority links</li>
        </ul>
      </li>

      <li class="service-card reveal">
        <div class="service-num" data-tag="aeo">03 &mdash;</div>
        <h3>AEO &amp; AI Search</h3>
        <p>Answer Engine Optimization for ChatGPT, Perplexity, Google AI Overviews, and Claude. Powered by our own SerpSling platform.</p>
        <ul class="service-pills" role="list">
          <li>SerpSling</li><li>llms.txt</li><li>Entity SEO</li>
        </ul>
      </li>

      <li class="service-card reveal">
        <div class="service-num" data-tag="ppc">04 &mdash;</div>
        <h3>Google &amp; Bing Ads</h3>
        <p>Search, Performance Max, and YouTube &mdash; built around conversion APIs and offline conversion uploads so the algorithm optimizes for closed revenue, not form fills.</p>
        <ul class="service-pills" role="list">
          <li>Google Search</li><li>PMax</li><li>YouTube</li>
        </ul>
      </li>

      <li class="service-card reveal">
        <div class="service-num" data-tag="meta">05 &mdash;</div>
        <h3>Meta &amp; Social Ads</h3>
        <p>Facebook and Instagram lead-generation and direct-response, with creative testing pipelines and CAPI server-side tracking properly implemented.</p>
        <ul class="service-pills" role="list">
          <li>Facebook</li><li>Instagram</li><li>TikTok</li>
        </ul>
      </li>

      <li class="service-card reveal">
        <div class="service-num" data-tag="content">06 &mdash;</div>
        <h3>Content &amp; Copy</h3>
        <p>Long-form articles, sales pages, and email sequences written by people who have actually run businesses &mdash; not AI-generated filler with a thin human edit.</p>
        <ul class="service-pills" role="list">
          <li>Editorial articles</li><li>Sales pages</li><li>Email</li>
        </ul>
      </li>

      <li class="service-card reveal">
        <div class="service-num" data-tag="voice">07 &mdash;</div>
        <h3>AI Voice Agents</h3>
        <p>Inbound and outbound AI phone agents that qualify leads, book appointments, and answer FAQs around the clock &mdash; trained on your actual offer and objection language.</p>
        <ul class="service-pills" role="list">
          <li>Inbound</li><li>Outbound</li><li>CRM-routed</li>
        </ul>
      </li>

      <li class="service-card reveal">
        <div class="service-num" data-tag="chat">08 &mdash;</div>
        <h3>AI Chat &amp; Automation</h3>
        <p>On-site AI chat, lead routing, and back-office automation. We connect your forms, calendar, CRM, and ad platforms so leads stop falling through the cracks.</p>
        <ul class="service-pills" role="list">
          <li>Site chat</li><li>Workflows</li><li>Integrations</li>
        </ul>
      </li>

    </ul>
  </div>
</section>

<!-- ============== APPROACH ============== -->
<section class="section section-approach" id="approach">
  <div class="container approach-grid">

    <div>
      <figure class="approach-figure reveal">
        <img src="<?php echo esc_url( MKT_URI . '/assets/img/process_still.png' ); ?>" alt="Quiet workspace still life &mdash; blueprint, brass pen, espresso &mdash; suggesting careful, considered work" />
      </figure>
      <div class="approach-meta-bar">
        <span>Discovery <b>&le; 15 min</b></span>
        <span>Proposal <b>&le; 3 biz days</b></span>
        <span>Senior on work <b>100%</b></span>
      </div>
    </div>

    <div class="approach-copy">
      <p class="eyebrow reveal">Our approach</p>
      <h2 class="section-title reveal"><?php echo esc_html( mkt_mod( 'mkt_approach_title' ) ); ?></h2>
      <p class="lede reveal">
        <?php echo esc_html( mkt_mod( 'mkt_approach_lede' ) ); ?>
      </p>

      <ol class="approach-list reveal" role="list">
        <li>
          <span class="approach-num">01_listen</span>
          <div>
            <h3>Listen first</h3>
            <p>A real conversation about the business, the numbers, and where the seams are. No pitch deck.</p>
          </div>
          <span class="approach-tag">~15 min call</span>
        </li>
        <li>
          <span class="approach-num">02_diagnose</span>
          <div>
            <h3>Diagnose, then propose</h3>
            <p>A short written plan with scope, timeline, and a fixed price &mdash; usually within 3 business days.</p>
          </div>
          <span class="approach-tag">&le; 3 biz days</span>
        </li>
        <li>
          <span class="approach-num">03_build</span>
          <div>
            <h3>Senior hands on the work</h3>
            <p>The person you spoke with is the person doing the work. Never a hand-off to a junior team.</p>
          </div>
          <span class="approach-tag">senior &middot; in-house</span>
        </li>
        <li>
          <span class="approach-num">04_measure</span>
          <div>
            <h3>Measure what matters</h3>
            <p>Pipeline, booked calls, closed revenue. Not impressions, not vanity rankings, not &ldquo;engagement.&rdquo;</p>
          </div>
          <span class="approach-tag">revenue, not vanity</span>
        </li>
      </ol>
    </div>

  </div>
</section>

<!-- ============== INTAKE / FORM ============== -->
<section class="section section-intake" id="intake">
  <div class="container intake-wrap">

    <div class="intake-head">
      <p class="eyebrow reveal">Start a project</p>
      <h2 class="section-title reveal"><?php echo esc_html( mkt_mod( 'mkt_intake_title' ) ); ?></h2>
      <p class="lede centered reveal"><?php echo esc_html( mkt_mod( 'mkt_intake_lede' ) ); ?></p>
    </div>

    <?php if ( $intake_msg ) : ?>
      <p class="form-status <?php echo esc_attr( $intake_msg_cls ); ?>" role="status" style="display:block;margin-bottom:20px;"><?php echo esc_html( $intake_msg ); ?></p>
    <?php endif; ?>

    <form class="intake-form" id="intake-form" action="<?php echo esc_url( home_url( '/#intake' ) ); ?>" method="post" novalidate>

      <!-- Identity -->
      <fieldset class="form-section">
        <legend class="form-legend">01 &mdash; About you</legend>
        <div class="form-row two">
          <label class="field">
            <span class="field-label">First name</span>
            <input type="text" name="first_name" required autocomplete="given-name" />
          </label>
          <label class="field">
            <span class="field-label">Last name</span>
            <input type="text" name="last_name" required autocomplete="family-name" />
          </label>
        </div>
        <div class="form-row two">
          <label class="field">
            <span class="field-label">Email</span>
            <input type="email" name="email" required autocomplete="email" />
          </label>
          <label class="field">
            <span class="field-label">Phone <span class="opt">(optional)</span></span>
            <input type="tel" name="phone" autocomplete="tel" />
          </label>
        </div>
        <div class="form-row two">
          <label class="field">
            <span class="field-label">Company</span>
            <input type="text" name="company" autocomplete="organization" />
          </label>
          <label class="field">
            <span class="field-label">Website <span class="opt">(if any)</span></span>
            <input type="url" name="website" placeholder="https://" />
          </label>
        </div>
      </fieldset>

      <!-- Services -->
      <fieldset class="form-section">
        <legend class="form-legend">02 &mdash; What do you need help with?</legend>
        <p class="form-help">Select every service you&rsquo;re considering &mdash; we&rsquo;ll figure out the priority together.</p>
        <ul class="service-checks" role="list">
          <li><label class="check"><input type="checkbox" name="services[]" value="Web Design" /><span>Web design &amp; development</span></label></li>
          <li><label class="check"><input type="checkbox" name="services[]" value="SEO" /><span>SEO</span></label></li>
          <li><label class="check"><input type="checkbox" name="services[]" value="AEO" /><span>AEO &amp; AI search</span></label></li>
          <li><label class="check"><input type="checkbox" name="services[]" value="Google Ads" /><span>Google &amp; Bing Ads (PPC)</span></label></li>
          <li><label class="check"><input type="checkbox" name="services[]" value="Meta Ads" /><span>Facebook &amp; Instagram Ads</span></label></li>
          <li><label class="check"><input type="checkbox" name="services[]" value="Content" /><span>Content &amp; copywriting</span></label></li>
          <li><label class="check"><input type="checkbox" name="services[]" value="AI Voice" /><span>AI voice agents (inbound calls)</span></label></li>
          <li><label class="check"><input type="checkbox" name="services[]" value="AI Chat" /><span>AI chatbots &amp; automation</span></label></li>
          <li><label class="check"><input type="checkbox" name="services[]" value="Not sure yet" /><span>Not sure yet &mdash; help me figure it out</span></label></li>
        </ul>
      </fieldset>

      <!-- Project details -->
      <fieldset class="form-section">
        <legend class="form-legend">03 &mdash; The project</legend>
        <label class="field">
          <span class="field-label">Describe what you want, in as much detail as possible</span>
          <textarea name="project_brief" rows="6" required placeholder="What does the business do? Who is the customer? What does success look like in 6 months? What have you tried? What's not working? The more context, the better we can respond."></textarea>
        </label>

        <div class="form-row two" style="margin-top: 16px;">
          <label class="field">
            <span class="field-label">Budget range</span>
            <select name="budget_range" required>
              <option value="" disabled selected>Select a range</option>
              <option value="Under $3k">Under $3,000</option>
              <option value="$3k&ndash;$10k">$3,000 &ndash; $10,000</option>
              <option value="$10k&ndash;$25k">$10,000 &ndash; $25,000</option>
              <option value="$25k&ndash;$50k">$25,000 &ndash; $50,000</option>
              <option value="$50k+">$50,000+</option>
              <option value="Ongoing retainer">Ongoing monthly retainer</option>
              <option value="Not sure yet">Not sure yet</option>
            </select>
          </label>
          <label class="field">
            <span class="field-label">Specific budget number <span class="opt">(optional)</span></span>
            <input type="text" name="budget_specific" placeholder="e.g. $18,000 or $4,500/mo" />
          </label>
        </div>

        <div class="form-row two">
          <label class="field">
            <span class="field-label">When do you want to start?</span>
            <select name="timeline">
              <option value="" disabled selected>Select a timeline</option>
              <option value="ASAP">As soon as possible</option>
              <option value="2&ndash;4 weeks">In the next 2&ndash;4 weeks</option>
              <option value="1&ndash;3 months">In the next 1&ndash;3 months</option>
              <option value="Just exploring">Just exploring for now</option>
            </select>
          </label>
          <label class="field">
            <span class="field-label">How did you hear about us?</span>
            <input type="text" name="source" placeholder="Referral, search, social, etc." />
          </label>
        </div>

        <label class="field" style="margin-top: 16px;">
          <span class="field-label">Anything else you&rsquo;d like us to know? <span class="opt">(optional)</span></span>
          <textarea name="feedback" rows="4" placeholder="Other agencies you've worked with, frustrations, things you definitely don't want, links to sites you love, etc."></textarea>
        </label>
      </fieldset>

      <!-- Honeypot -->
      <div class="hp" aria-hidden="true" style="position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden;">
        <label>Leave this field empty
          <input type="text" name="website_url_hp" tabindex="-1" autocomplete="off" />
        </label>
      </div>

      <!-- Classic POST marker + nonce (fallback if JS disabled) -->
      <input type="hidden" name="mkt_intake" value="1" />
      <?php wp_nonce_field( 'mkt_intake', 'mkt_intake_nonce' ); ?>

      <div class="form-foot">
        <p class="form-note">// We respond in writing within one business day. Everything you share is treated as confidential.</p>
        <button type="submit" class="btn btn-primary btn-lg">Send the brief</button>
      </div>

      <p class="form-status" id="form-status" role="status" aria-live="polite"></p>
    </form>

  </div>
</section>

<!-- ============== CONTACT STRIP ============== -->
<section class="section section-contact" id="contact">
  <div class="container contact-row">
    <div>
      <p class="eyebrow eyebrow-light reveal">Prefer to skip the form?</p>
      <h2 class="contact-title reveal"><?php echo esc_html( mkt_mod( 'mkt_contact_title' ) ); ?></h2>
    </div>
    <ul class="contact-list reveal" role="list">
      <li>
        <span class="contact-k">Phone</span>
        <a href="<?php echo esc_attr( $phone_href ); ?>" class="contact-v"><?php echo esc_html( $phone ); ?></a>
      </li>
      <li>
        <span class="contact-k">Email</span>
        <a href="mailto:<?php echo esc_attr( $email ); ?>" class="contact-v"><?php echo esc_html( $email ); ?></a>
      </li>
      <li>
        <span class="contact-k">Hours</span>
        <span class="contact-v"><?php echo esc_html( $hours ); ?></span>
      </li>
    </ul>
  </div>
</section>

</main>

<?php get_footer(); ?>
