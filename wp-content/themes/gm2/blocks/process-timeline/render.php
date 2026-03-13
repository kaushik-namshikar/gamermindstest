<?php if (!defined('ABSPATH')) exit; ?>
<section class="process-timeline-section">
    <div class="container">
        <h2>Our Process</h2>
        <div class="timeline">
            <?php
            $steps = array(
                'Scope' => 'Requirements & targets',
                'Prep' => 'Glossary + Style Guide',
                'Translate' => 'Professional work',
                'LQA' => 'Quality assurance',
                'Deliver' => 'Final files & support'
            );
            $count = 0;
            foreach ($steps as $title => $desc) :
                $count++;
            ?>
                <div class="timeline-item scroll-fade-in">
                    <div class="timeline-number"><?php echo $count; ?></div>
                    <h3><?php echo $title; ?></h3>
                    <p><?php echo $desc; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<style>
.process-timeline-section { padding: 4rem 1.5rem; }
.timeline { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 2rem; margin-top: 2rem; position: relative; }
.timeline::before { content: ''; position: absolute; top: 30px; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, var(--gm-purple), var(--gm-indigo)); z-index: -1; }
.timeline-item { text-align: center; }
.timeline-number { display: flex; align-items: center; justify-content: center; width: 60px; height: 60px; background: linear-gradient(135deg, var(--gm-purple), var(--gm-indigo)); color: white; border-radius: 50%; font-weight: 900; font-size: 1.5rem; margin: 0 auto 1rem; }
.timeline-item h3 { margin-bottom: 0.5rem; font-size: var(--gm-font-size-lg); }
.timeline-item p { color: var(--gm-text-muted); font-size: 0.875rem; }
@media (max-width: 768px) { .timeline { grid-template-columns: 1fr; } .timeline::before { display: none; } }
</style>
