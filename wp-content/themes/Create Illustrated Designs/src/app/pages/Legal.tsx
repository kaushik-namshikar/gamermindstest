import { Navigation } from '../components/Navigation';
import { Footer } from '../components/Footer';
import { motion } from 'motion/react';
import { FileText } from 'lucide-react';

export function Legal() {
  return (
    <div className="min-h-screen bg-gradient-to-br from-gray-950 via-purple-950 to-gray-950">
      <Navigation />
      
      <section className="relative py-20 px-6">
        <div className="container mx-auto max-w-4xl">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6 }}
            className="mb-12 text-center"
          >
            <div className="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-purple-500 to-indigo-600 mb-6 shadow-lg shadow-purple-500/50">
              <FileText className="w-10 h-10 text-white" />
            </div>
            <h1 className="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-purple-300 to-pink-300 bg-clip-text text-transparent">
              Terms & Legal
            </h1>
            <p className="text-purple-300/60">
              Last updated: March 2, 2026
            </p>
          </motion.div>
          
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="bg-gradient-to-br from-purple-950/50 to-indigo-950/50 backdrop-blur-sm border border-purple-500/30 rounded-2xl p-8 md:p-12 space-y-8"
          >
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">Impressum / Legal Notice</h2>
              <div className="text-purple-200/80 leading-relaxed space-y-2">
                <p><strong className="text-purple-200">Company Name:</strong> Gamer Minds LLC</p>
                <p><strong className="text-purple-200">Address:</strong> [Company Address]</p>
                <p><strong className="text-purple-200">Email:</strong> contact@gamerminds.com</p>
                <p><strong className="text-purple-200">Registration Number:</strong> [Registration Number]</p>
                <p><strong className="text-purple-200">VAT ID:</strong> [VAT Number]</p>
              </div>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">Terms of Service</h2>
              <p className="text-purple-200/80 leading-relaxed">
                By accessing and using this website and our services, you accept and agree to be bound by the following terms and conditions.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">1. Service Description</h2>
              <div className="space-y-4 text-purple-200/80">
                <div>
                  <h3 className="font-semibold text-purple-200 mb-2">For Studios & Publishers</h3>
                  <p className="leading-relaxed">
                    We provide professional game localization services including translation, editing, and linguistic quality 
                    assurance (LQA). All services are subject to individual project agreements and quotes.
                  </p>
                </div>
                <div>
                  <h3 className="font-semibold text-purple-200 mb-2">For Players</h3>
                  <p className="leading-relaxed">
                    We operate a community voting platform via Discord where players can request and vote for game localizations. 
                    Voting does not guarantee localization and creates no obligation for any party.
                  </p>
                </div>
              </div>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">2. Voting Platform Disclaimer</h2>
              <p className="text-purple-200/80 leading-relaxed mb-4">
                The player voting platform is a demand aggregation tool only. By participating, you acknowledge that:
              </p>
              <ul className="list-disc list-inside space-y-2 text-purple-200/80">
                <li>Voting does not guarantee any game will be localized</li>
                <li>We cannot compel developers to localize their games</li>
                <li>Expressing willingness to pay does not create a financial obligation</li>
                <li>We aggregate and present data to developers, but final decisions rest with rights holders</li>
                <li>No refunds or compensation are owed if a requested localization does not occur</li>
              </ul>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">3. Intellectual Property</h2>
              <p className="text-purple-200/80 leading-relaxed">
                All content on this website, including text, graphics, logos, and software, is the property of Gamer Minds 
                or its content suppliers and is protected by intellectual property laws. Game names and trademarks mentioned 
                in voting campaigns remain the property of their respective owners.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">4. Professional Services Terms</h2>
              <p className="text-purple-200/80 leading-relaxed mb-4">
                For localization projects commissioned by studios:
              </p>
              <ul className="list-disc list-inside space-y-2 text-purple-200/80">
                <li>All work is governed by individual project agreements and quotes</li>
                <li>Pricing is based on source wordcount, target languages, and scope</li>
                <li>We support NDAs and confidentiality agreements</li>
                <li>Payment terms and delivery schedules are defined per project</li>
                <li>We retain no rights to client intellectual property</li>
              </ul>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">5. Limitation of Liability</h2>
              <p className="text-purple-200/80 leading-relaxed">
                To the maximum extent permitted by law, Gamer Minds shall not be liable for any indirect, incidental, special, 
                or consequential damages arising from your use of our website or services. For professional localization services, 
                liability is limited to the amount paid for the specific project.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">6. User Conduct</h2>
              <p className="text-purple-200/80 leading-relaxed mb-4">
                Users of our website and Discord community agree to:
              </p>
              <ul className="list-disc list-inside space-y-2 text-purple-200/80">
                <li>Provide accurate information when submitting quotes or participating in voting</li>
                <li>Not engage in harassment, spam, or abusive behavior</li>
                <li>Respect intellectual property rights of game developers and publishers</li>
                <li>Not attempt to manipulate voting results or submit fraudulent data</li>
              </ul>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">7. Third-Party Links</h2>
              <p className="text-purple-200/80 leading-relaxed">
                Our website may contain links to third-party websites (including Discord). We are not responsible for the 
                content, privacy policies, or practices of these external sites.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">8. Termination</h2>
              <p className="text-purple-200/80 leading-relaxed">
                We reserve the right to terminate or suspend access to our services for violations of these terms, fraudulent 
                activity, or at our discretion. Active localization projects will be completed according to their individual agreements.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">9. Governing Law</h2>
              <p className="text-purple-200/80 leading-relaxed">
                These terms shall be governed by and construed in accordance with the laws of [Jurisdiction], without regard 
                to its conflict of law provisions. Any disputes shall be subject to the exclusive jurisdiction of the courts 
                in [Location].
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">10. Changes to Terms</h2>
              <p className="text-purple-200/80 leading-relaxed">
                We reserve the right to modify these terms at any time. Changes will be posted on this page with an updated 
                revision date. Continued use of our services after changes constitutes acceptance of the new terms.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">Contact Information</h2>
              <p className="text-purple-200/80 leading-relaxed mb-4">
                For questions about these terms or legal inquiries, please contact us:
              </p>
              <div className="p-4 bg-purple-900/30 border border-purple-500/30 rounded-xl">
                <p className="text-purple-200">Email: legal@gamerminds.com</p>
                <p className="text-purple-200">Address: [Company Address]</p>
              </div>
            </section>
          </motion.div>
        </div>
      </section>
      
      <Footer />
    </div>
  );
}
