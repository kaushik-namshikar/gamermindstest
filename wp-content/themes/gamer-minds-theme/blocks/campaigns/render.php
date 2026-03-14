<?php
/**
 * Block: gm/campaigns
 * Mirrors: Players.tsx — Active Campaigns Section
 * bg-[#171a21], flat Steam-style cards bg-[#1b2838] border-t border-[#2a475e]
 */
$a            = $attributes ?? [];
$section_heading = isset( $a['heading'] )     ? $a['heading']     : 'Active campaigns';
$section_sub     = isset( $a['subheading'] )  ? $a['subheading']  : 'Help these games reach your region';
$view_all_text   = isset( $a['viewAllText'] ) ? $a['viewAllText'] : 'View all 150+ campaigns';

$campaigns = [
    [
        'title'     => 'Echoes of the Abyss',
        'genre'     => 'Soulslike JRPG',
        'developer' => 'Moonlit Studios',
        'votes'     => 3847,
        'target'    => 5000,
        'languages' => [ 'Portuguese (BR)', 'Spanish', 'French' ],
        'status'    => 'Dev is listening',
        'trending'  => true,
        'comments'  => 127,
        'img'       => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=800&q=80',
    ],
    [
        'title'     => 'Neon Protocols',
        'genre'     => 'Cyberpunk RPG',
        'developer' => 'Pixel Forge',
        'votes'     => 2921,
        'target'    => 4000,
        'languages' => [ 'Korean', 'Japanese', 'Chinese' ],
        'status'    => 'Building case',
        'trending'  => false,
        'comments'  => 89,
        'img'       => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=800&q=80',
    ],
    [
        'title'     => 'Celestial Forge',
        'genre'     => 'Fantasy Tactics',
        'developer' => 'Ember Games',
        'votes'     => 2104,
        'target'    => 3500,
        'languages' => [ 'Polish', 'Russian', 'Turkish' ],
        'status'    => 'Just launched',
        'trending'  => false,
        'comments'  => 54,
        'img'       => 'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?w=800&q=80',
    ],
];
?>

<section class="gm-campaigns" id="campaigns" style="background:#171a21;padding:3rem 1.5rem;">
    <div class="gm-campaigns__inner" style="max-width:80rem;margin:0 auto;">

        <div class="gm-campaigns__heading gm-fade-in" style="margin-bottom:2rem;">
            <h2 style="font-size:1.875rem;font-weight:900;color:#fff;margin-bottom:0.5rem;"><?php echo esc_html( $section_heading ); ?></h2>
            <p style="color:#8f98a0;"><?php echo esc_html( $section_sub ); ?></p>
        </div>

        <div class="gm-campaigns__grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.25rem;">
            <?php foreach ( $campaigns as $i => $c ) :
                $pct = min( 100, round( ( $c['votes'] / $c['target'] ) * 100 ) );
            ?>
            <article class="gm-campaign-card gm-fade-in gm-fade-in--delay-<?php echo $i + 1; ?>"
                     style="background:#1b2838;border-top:1px solid #2a475e;transition:background 0.2s;">

                <!-- Game image -->
                <div style="position:relative;height:11rem;overflow:hidden;">
                    <img
                        src="<?php echo esc_url( $c['img'] ); ?>"
                        alt="<?php echo esc_attr( $c['title'] ); ?>"
                        loading="lazy"
                        style="width:100%;height:100%;object-fit:cover;transition:transform 0.5s;"
                    >
                    <?php if ( $c['trending'] ) : ?>
                    <div style="position:absolute;top:0.5rem;left:0.5rem;">
                        <span style="display:inline-flex;align-items:center;gap:0.25rem;background:#ff6b2b;padding:0.25rem 0.5rem;font-size:0.75rem;font-weight:700;color:#fff;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                            HOT
                        </span>
                    </div>
                    <?php endif; ?>
                    <!-- Gradient overlay -->
                    <div style="position:absolute;inset:0;background:linear-gradient(to top,#1b2838,transparent,transparent);opacity:0.6;"></div>
                </div>

                <div style="padding:1rem;">
                    <!-- Title & meta -->
                    <h3 style="font-size:1.25rem;font-weight:700;color:#fff;margin-bottom:0.25rem;"><?php echo esc_html( $c['title'] ); ?></h3>
                    <p style="font-size:0.875rem;color:#66c0f4;margin-bottom:0.125rem;"><?php echo esc_html( $c['genre'] ); ?></p>
                    <p style="font-size:0.75rem;color:#8f98a0;margin-bottom:0.75rem;">by <?php echo esc_html( $c['developer'] ); ?></p>

                    <!-- Upvote & progress -->
                    <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.75rem;">
                        <div style="display:flex;align-items:center;gap:0.375rem;">
                            <div style="width:2rem;height:2rem;background:#2a475e;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:background 0.2s;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#c7d5e0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="19" x2="12" y2="5"/><polyline points="5 12 12 5 19 12"/></svg>
                            </div>
                            <div>
                                <div style="font-size:1.125rem;font-weight:900;color:#fff;"><?php echo number_format( $c['votes'] ); ?></div>
                                <div style="font-size:0.75rem;color:#8f98a0;">votes</div>
                            </div>
                        </div>
                        <div style="flex:1;">
                            <div style="font-size:0.75rem;color:#8f98a0;margin-bottom:0.25rem;">Goal: <?php echo number_format( $c['target'] ); ?></div>
                            <div style="height:6px;background:#0e1419;overflow:hidden;">
                                <div class="gm-campaign-card__progress-fill" data-pct="<?php echo $pct; ?>" style="height:100%;background:linear-gradient(to right,#5c7e10,#6d9513);width:<?php echo $pct; ?>%;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Language tags -->
                    <div style="display:flex;flex-wrap:wrap;gap:0.375rem;margin-bottom:0.75rem;">
                        <?php foreach ( array_slice( $c['languages'], 0, 3 ) as $lang ) : ?>
                        <span style="font-size:0.75rem;background:#2a475e;color:#c7d5e0;padding:0.125rem 0.5rem;"><?php echo esc_html( $lang ); ?></span>
                        <?php endforeach; ?>
                    </div>

                    <!-- Status & comments -->
                    <div style="display:flex;align-items:center;justify-content:space-between;padding-top:0.75rem;border-top:1px solid #2a475e;">
                        <div style="display:flex;align-items:center;gap:0.375rem;font-size:0.75rem;color:#5c7e10;font-weight:500;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <?php echo esc_html( $c['status'] ); ?>
                        </div>
                        <div style="display:flex;align-items:center;gap:0.375rem;font-size:0.75rem;color:#8f98a0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                            <?php echo esc_html( $c['comments'] ); ?>
                        </div>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <div style="margin-top:1.5rem;" class="gm-fade-in">
            <a href="#" style="display:inline-flex;align-items:center;gap:0.5rem;background:#2a475e;border:none;color:#c7d5e0;font-weight:700;padding:0.625rem 1.25rem;text-decoration:none;transition:background 0.2s;">
                <?php echo esc_html( $view_all_text ); ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </a>
        </div>
    </div>
</section>
