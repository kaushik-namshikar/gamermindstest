<?php
/**
 * Block: gm/policy-content
 * Mirrors: Privacy.tsx (10 sections) + Legal.tsx (11 sections + contact)
 * bg-gradient-br from-purple-950/50 to-indigo-950/50 border border-purple-500/30
 * Accepts attribute: variant = 'privacy' | 'legal'
 */
$variant = isset( $attributes['variant'] ) ? $attributes['variant'] : 'privacy';
?>

<div class="gm-policy-content gm-fade-in gm-fade-in--delay-1">
<div class="gm-policy-card" style="background:linear-gradient(135deg,rgba(88,28,135,0.3),rgba(49,46,129,0.3));border:1px solid rgba(168,85,247,0.3);border-radius:1rem;padding:clamp(2rem,5vw,3rem);display:flex;flex-direction:column;gap:2rem;">

<?php if ( $variant === 'legal' ) : ?>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">Impressum / Legal Notice</h2>
        <div style="color:rgba(216,180,254,0.8);line-height:1.7;display:flex;flex-direction:column;gap:0.5rem;">
            <p><strong style="color:rgba(216,180,254,1);">Company Name:</strong> Gamer Minds LLC</p>
            <p><strong style="color:rgba(216,180,254,1);">Address:</strong> [Company Address]</p>
            <p><strong style="color:rgba(216,180,254,1);">Email:</strong> contact@gamerminds.com</p>
            <p><strong style="color:rgba(216,180,254,1);">Registration Number:</strong> [Registration Number]</p>
            <p><strong style="color:rgba(216,180,254,1);">VAT ID:</strong> [VAT Number]</p>
        </div>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">Terms of Service</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;">By accessing and using this website and our services, you accept and agree to be bound by the following terms and conditions.</p>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">1. Service Description</h2>
        <div style="color:rgba(216,180,254,0.8);line-height:1.7;display:flex;flex-direction:column;gap:1rem;">
            <div>
                <h3 style="font-weight:600;color:rgba(216,180,254,1);margin-bottom:0.5rem;">For Studios &amp; Publishers</h3>
                <p>We provide professional game localization services including translation, editing, and linguistic quality assurance (LQA). All services are subject to individual project agreements and quotes.</p>
            </div>
            <div>
                <h3 style="font-weight:600;color:rgba(216,180,254,1);margin-bottom:0.5rem;">For Players</h3>
                <p>We operate a community voting platform via Discord where players can request and vote for game localizations. Voting does not guarantee localization and creates no obligation for any party.</p>
            </div>
        </div>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">2. Voting Platform Disclaimer</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;margin-bottom:1rem;">The player voting platform is a demand aggregation tool only. By participating, you acknowledge that:</p>
        <ul style="color:rgba(216,180,254,0.8);list-style:disc;padding-left:1.5rem;display:flex;flex-direction:column;gap:0.5rem;">
            <li>Voting does not guarantee any game will be localized</li>
            <li>We cannot compel developers to localize their games</li>
            <li>Expressing willingness to pay does not create a financial obligation</li>
            <li>We aggregate and present data to developers, but final decisions rest with rights holders</li>
            <li>No refunds or compensation are owed if a requested localization does not occur</li>
        </ul>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">3. Intellectual Property</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;">All content on this website, including text, graphics, logos, and software, is the property of Gamer Minds or its content suppliers and is protected by intellectual property laws. Game names and trademarks mentioned in voting campaigns remain the property of their respective owners.</p>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">4. Professional Services Terms</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;margin-bottom:1rem;">For localization projects commissioned by studios:</p>
        <ul style="color:rgba(216,180,254,0.8);list-style:disc;padding-left:1.5rem;display:flex;flex-direction:column;gap:0.5rem;">
            <li>All work is governed by individual project agreements and quotes</li>
            <li>Pricing is based on source wordcount, target languages, and scope</li>
            <li>We support NDAs and confidentiality agreements</li>
            <li>Payment terms and delivery schedules are defined per project</li>
            <li>We retain no rights to client intellectual property</li>
        </ul>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">5. Limitation of Liability</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;">To the maximum extent permitted by law, Gamer Minds shall not be liable for any indirect, incidental, special, or consequential damages arising from your use of our website or services. For professional localization services, liability is limited to the amount paid for the specific project.</p>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">6. User Conduct</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;margin-bottom:1rem;">Users of our website and Discord community agree to:</p>
        <ul style="color:rgba(216,180,254,0.8);list-style:disc;padding-left:1.5rem;display:flex;flex-direction:column;gap:0.5rem;">
            <li>Provide accurate information when submitting quotes or participating in voting</li>
            <li>Not engage in harassment, spam, or abusive behavior</li>
            <li>Respect intellectual property rights of game developers and publishers</li>
            <li>Not attempt to manipulate voting results or submit fraudulent data</li>
        </ul>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">7. Third-Party Links</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;">Our website may contain links to third-party websites (including Discord). We are not responsible for the content, privacy policies, or practices of these external sites.</p>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">8. Termination</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;">We reserve the right to terminate or suspend access to our services for violations of these terms, fraudulent activity, or at our discretion. Active localization projects will be completed according to their individual agreements.</p>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">9. Governing Law</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;">These terms shall be governed by and construed in accordance with the laws of [Jurisdiction], without regard to its conflict of law provisions. Any disputes shall be subject to the exclusive jurisdiction of the courts in [Location].</p>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">10. Changes to Terms</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;">We reserve the right to modify these terms at any time. Changes will be posted on this page with an updated revision date. Continued use of our services after changes constitutes acceptance of the new terms.</p>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">Contact Information</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;margin-bottom:1rem;">For questions about these terms or legal inquiries, please contact us:</p>
        <div class="gm-policy-email-box" style="padding:1rem;background:rgba(88,28,135,0.3);border:1px solid rgba(168,85,247,0.3);border-radius:0.75rem;">
            <p style="color:rgba(216,180,254,1);">Email: legal@gamerminds.com</p>
            <p style="color:rgba(216,180,254,1);">Address: [Company Address]</p>
        </div>
    </div>

<?php else : ?>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">Introduction</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;">Gamer Minds ("we," "us," or "our") respects your privacy and is committed to protecting your personal data. This privacy policy explains how we collect, use, and protect information when you use our website and services.</p>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">Information We Collect</h2>
        <div style="color:rgba(216,180,254,0.8);line-height:1.7;display:flex;flex-direction:column;gap:1rem;">
            <div>
                <h3 style="font-weight:600;color:rgba(216,180,254,1);margin-bottom:0.5rem;">Contact Information</h3>
                <p>When you request a quote or contact us, we collect your name, email address, company name, and any information you choose to provide about your localization project.</p>
            </div>
            <div>
                <h3 style="font-weight:600;color:rgba(216,180,254,1);margin-bottom:0.5rem;">Discord Voting Data</h3>
                <p>For players who participate in our voting platform via Discord, we collect voting preferences, game requests, language preferences, and Discord user identifiers. This data is used solely to compile demand statistics.</p>
            </div>
            <div>
                <h3 style="font-weight:600;color:rgba(216,180,254,1);margin-bottom:0.5rem;">Usage Data</h3>
                <p>We may collect information about how you access and use our website, including your IP address, browser type, pages visited, and time spent on pages.</p>
            </div>
        </div>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">How We Use Your Information</h2>
        <ul style="color:rgba(216,180,254,0.8);list-style:disc;padding-left:1.5rem;display:flex;flex-direction:column;gap:0.5rem;">
            <li>To respond to your inquiries and provide quotes for localization services</li>
            <li>To aggregate voting data and approach developers with demand statistics</li>
            <li>To improve our services and user experience</li>
            <li>To send you relevant updates about your projects or votes (with your consent)</li>
            <li>To comply with legal obligations and protect our rights</li>
        </ul>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">Data Sharing</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;margin-bottom:1rem;">We do not sell your personal data. We may share aggregated, anonymized voting statistics with game developers to demonstrate demand for localization. Individual voter data remains private.</p>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;">We may share your information with trusted service providers who assist us in operating our website and conducting our business, under strict confidentiality agreements.</p>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">Data Security</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;">We implement appropriate technical and organizational measures to protect your personal data against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet is 100% secure.</p>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">Your Rights</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;margin-bottom:1rem;">Depending on your location, you may have the following rights regarding your personal data:</p>
        <ul style="color:rgba(216,180,254,0.8);list-style:disc;padding-left:1.5rem;display:flex;flex-direction:column;gap:0.5rem;">
            <li>Right to access your personal data</li>
            <li>Right to correct inaccurate data</li>
            <li>Right to request deletion of your data</li>
            <li>Right to restrict or object to data processing</li>
            <li>Right to data portability</li>
        </ul>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">Cookies and Tracking</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;">Our website may use cookies and similar tracking technologies to improve user experience and analyze website traffic. You can control cookie preferences through your browser settings.</p>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">Children's Privacy</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;">Our services are not directed to individuals under the age of 13. We do not knowingly collect personal data from children. If you believe we have collected data from a child, please contact us immediately.</p>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">Changes to This Policy</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;">We may update this privacy policy from time to time. We will notify you of any material changes by posting the new policy on this page and updating the "Last updated" date.</p>
    </div>

    <div class="gm-policy-section">
        <h2 style="font-size:1.5rem;font-weight:700;color:rgba(240,221,255,1);margin-bottom:1rem;">Contact Us</h2>
        <p style="color:rgba(216,180,254,0.8);line-height:1.7;margin-bottom:1rem;">If you have questions about this privacy policy or wish to exercise your data rights, please contact us at:</p>
        <div class="gm-policy-email-box" style="padding:1rem;background:rgba(88,28,135,0.3);border:1px solid rgba(168,85,247,0.3);border-radius:0.75rem;">
            <p style="color:rgba(216,180,254,1);">Email: privacy@gamerminds.com</p>
        </div>
    </div>

<?php endif; ?>

</div>
</div>
