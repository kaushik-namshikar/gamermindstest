import { Navigation } from '../components/Navigation';
import { Footer } from '../components/Footer';
import { motion } from 'motion/react';
import { Shield } from 'lucide-react';

export function Privacy() {
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
              <Shield className="w-10 h-10 text-white" />
            </div>
            <h1 className="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-purple-300 to-pink-300 bg-clip-text text-transparent">
              Privacy Policy
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
              <h2 className="text-2xl font-bold text-purple-100 mb-4">Introduction</h2>
              <p className="text-purple-200/80 leading-relaxed">
                Gamer Minds ("we," "us," or "our") respects your privacy and is committed to protecting your personal data. 
                This privacy policy explains how we collect, use, and protect information when you use our website and services.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">Information We Collect</h2>
              <div className="space-y-4 text-purple-200/80">
                <div>
                  <h3 className="font-semibold text-purple-200 mb-2">Contact Information</h3>
                  <p className="leading-relaxed">
                    When you request a quote or contact us, we collect your name, email address, company name, and any information 
                    you choose to provide about your localization project.
                  </p>
                </div>
                <div>
                  <h3 className="font-semibold text-purple-200 mb-2">Discord Voting Data</h3>
                  <p className="leading-relaxed">
                    For players who participate in our voting platform via Discord, we collect voting preferences, game requests, 
                    language preferences, and Discord user identifiers. This data is used solely to compile demand statistics.
                  </p>
                </div>
                <div>
                  <h3 className="font-semibold text-purple-200 mb-2">Usage Data</h3>
                  <p className="leading-relaxed">
                    We may collect information about how you access and use our website, including your IP address, browser type, 
                    pages visited, and time spent on pages.
                  </p>
                </div>
              </div>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">How We Use Your Information</h2>
              <ul className="list-disc list-inside space-y-2 text-purple-200/80">
                <li>To respond to your inquiries and provide quotes for localization services</li>
                <li>To aggregate voting data and approach developers with demand statistics</li>
                <li>To improve our services and user experience</li>
                <li>To send you relevant updates about your projects or votes (with your consent)</li>
                <li>To comply with legal obligations and protect our rights</li>
              </ul>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">Data Sharing</h2>
              <p className="text-purple-200/80 leading-relaxed mb-4">
                We do not sell your personal data. We may share aggregated, anonymized voting statistics with game developers 
                to demonstrate demand for localization. Individual voter data remains private.
              </p>
              <p className="text-purple-200/80 leading-relaxed">
                We may share your information with trusted service providers who assist us in operating our website and 
                conducting our business, under strict confidentiality agreements.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">Data Security</h2>
              <p className="text-purple-200/80 leading-relaxed">
                We implement appropriate technical and organizational measures to protect your personal data against 
                unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the 
                internet is 100% secure.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">Your Rights</h2>
              <p className="text-purple-200/80 leading-relaxed mb-4">
                Depending on your location, you may have the following rights regarding your personal data:
              </p>
              <ul className="list-disc list-inside space-y-2 text-purple-200/80">
                <li>Right to access your personal data</li>
                <li>Right to correct inaccurate data</li>
                <li>Right to request deletion of your data</li>
                <li>Right to restrict or object to data processing</li>
                <li>Right to data portability</li>
              </ul>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">Cookies and Tracking</h2>
              <p className="text-purple-200/80 leading-relaxed">
                Our website may use cookies and similar tracking technologies to improve user experience and analyze website traffic. 
                You can control cookie preferences through your browser settings.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">Children's Privacy</h2>
              <p className="text-purple-200/80 leading-relaxed">
                Our services are not directed to individuals under the age of 13. We do not knowingly collect personal data 
                from children. If you believe we have collected data from a child, please contact us immediately.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">Changes to This Policy</h2>
              <p className="text-purple-200/80 leading-relaxed">
                We may update this privacy policy from time to time. We will notify you of any material changes by posting 
                the new policy on this page and updating the "Last updated" date.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-purple-100 mb-4">Contact Us</h2>
              <p className="text-purple-200/80 leading-relaxed">
                If you have questions about this privacy policy or wish to exercise your data rights, please contact us at:
              </p>
              <div className="mt-4 p-4 bg-purple-900/30 border border-purple-500/30 rounded-xl">
                <p className="text-purple-200">Email: privacy@gamerminds.com</p>
              </div>
            </section>
          </motion.div>
        </div>
      </section>
      
      <Footer />
    </div>
  );
}
