<?php
/**
 * Block: gm/games-portfolio
 * Mirrors: Developers.tsx — gamesWorkedOn section
 * 6-column grid with Unsplash images and hover overlays
 */
$games = [
    [
        'title' => 'Fantasy Quest',
        'langs' => '12 languages',
        'img'   => 'https://images.unsplash.com/photo-1635541860441-72b745aa7124?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxmYW50YXN5JTIwUlBHJTIwZ2FtZSUyMGNvdmVyJTIwYXJ0fGVufDF8fHx8MTc3MjY4Mzk1MXww&ixlib=rb-4.1.0&q=80&w=400',
    ],
    [
        'title' => 'Cyber Warriors',
        'langs' => '8 languages',
        'img'   => 'https://images.unsplash.com/photo-1580327332925-a10e6cb11baa?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxhY3Rpb24lMjB2aWRlbyUyMGdhbWUlMjBjb3ZlcnxlbnwxfHx8fDE3NzI2ODM5NTF8MA&ixlib=rb-4.1.0&q=80&w=400',
    ],
    [
        'title' => 'Pixel Legends',
        'langs' => '6 languages',
        'img'   => 'https://images.unsplash.com/photo-1660507224958-729c18ba1277?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxpbmRpZSUyMGdhbWUlMjBwaXhlbCUyMGFydHxlbnwxfHx8fDE3NzI2Nzk5MDR8MA&ixlib=rb-4.1.0&q=80&w=400',
    ],
    [
        'title' => 'Empire Simulator',
        'langs' => '10 languages',
        'img'   => 'https://images.unsplash.com/photo-1666467831470-8f26f983391f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzaW11bGF0aW9uJTIwZ2FtZSUyMHNjcmVlbnNob3R8ZW58MXx8fHwxNzcyNjgzOTUyfDA&ixlib=rb-4.1.0&q=80&w=400',
    ],
    [
        'title' => 'Tactical Command',
        'langs' => '9 languages',
        'img'   => 'https://images.unsplash.com/photo-1763107241634-b24671124bc3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzdHJhdGVneSUyMGdhbWUlMjBpbnRlcmZhY2V8ZW58MXx8fHwxNzcyNjgzOTUyfDA&ixlib=rb-4.1.0&q=80&w=400',
    ],
    [
        'title' => 'Adventure Odyssey',
        'langs' => '11 languages',
        'img'   => 'https://images.unsplash.com/photo-1765706729543-348de9e073b1?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxhZHZlbnR1cmUlMjBnYW1lJTIwbGFuZHNjYXBlfGVufDF8fHx8MTc3MjY0MDc4OHww&ixlib=rb-4.1.0&q=80&w=400',
    ],
];
?>

<section class="gm-portfolio" id="portfolio">

    <div class="gm-portfolio__heading gm-fade-in">
        <h2>GAMES WE WORKED ON</h2>
        <p>Trusted by studios across multiple genres</p>
    </div>

    <div class="gm-portfolio__grid">
        <?php foreach ( $games as $i => $game ) : ?>
        <div class="gm-portfolio__card gm-shine gm-fade-in gm-fade-in--delay-<?php echo min( $i + 1, 5 ); ?>">
            <div class="gm-portfolio__card-inner">
                <img
                    src="<?php echo esc_url( $game['img'] ); ?>"
                    alt="<?php echo esc_attr( $game['title'] ); ?>"
                    loading="lazy"
                    width="200"
                    height="267"
                    class="gm-portfolio__card-img"
                >
                <div class="gm-portfolio__card-overlay"></div>
                <div class="gm-portfolio__card-content">
                    <p class="gm-portfolio__card-title"><?php echo esc_html( $game['title'] ); ?></p>
                    <p class="gm-portfolio__card-langs"><?php echo esc_html( $game['langs'] ); ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</section>
