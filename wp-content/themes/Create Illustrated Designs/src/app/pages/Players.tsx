import { Navigation } from '../components/Navigation';
import { Footer } from '../components/Footer';
import { 
  MessageCircle,
  ThumbsUp,
  Globe2,
  CheckCircle2,
  Trophy,
  Users,
  Gamepad2,
  Heart,
  TrendingUp,
  Clock,
  Languages,
  ChevronRight,
  BarChart3,
  ArrowUp,
  MessageSquare,
  Play,
  Star
} from 'lucide-react';
import { motion } from 'motion/react';
import { ImageWithFallback } from '../components/figma/ImageWithFallback';
import { Button } from '../components/ui/button';
import { Badge } from '../components/ui/badge';
import {
  Accordion,
  AccordionContent,
  AccordionItem,
  AccordionTrigger,
} from '../components/ui/accordion';

// Target markets
const targetMarkets = [
  { region: 'Latin America', code: 'LATAM', languages: 'PT-BR, ES-LATAM', players: '120M+', flag: '🌎' },
  { region: 'Southeast Asia', code: 'SEA', languages: 'TH, VI, ID, MS', players: '95M+', flag: '🌏' },
  { region: 'Eastern Europe', code: 'EU-East', languages: 'PL, RU, CZ, RO', players: '85M+', flag: '🌍' },
  { region: 'Middle East', code: 'MENA', languages: 'AR, TR, FA', players: '70M+', flag: '🌍' },
];

// Active campaigns
const activeCampaigns = [
  {
    title: 'Echoes of the Abyss',
    genre: 'Soulslike JRPG',
    developer: 'Moonlit Studios',
    votes: 3847,
    target: 5000,
    languages: ['Portuguese (BR)', 'Spanish', 'French'],
    status: 'Dev is listening',
    trending: true,
    comments: 127,
    image: 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=800&q=80'
  },
  {
    title: 'Neon Protocols',
    genre: 'Cyberpunk RPG',
    developer: 'Pixel Forge',
    votes: 2921,
    target: 4000,
    languages: ['Korean', 'Japanese', 'Chinese'],
    status: 'Building case',
    trending: false,
    comments: 89,
    image: 'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=800&q=80'
  },
  {
    title: 'Celestial Forge',
    genre: 'Fantasy Tactics',
    developer: 'Ember Games',
    votes: 2104,
    target: 3500,
    languages: ['Polish', 'Russian', 'Turkish'],
    status: 'Just launched',
    trending: false,
    comments: 54,
    image: 'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?w=800&q=80'
  },
];

// Success stories
const victories = [
  {
    title: 'Crimson Vanguard',
    genre: 'Tactical RPG',
    outcome: 'Full localization shipped',
    languages: 'PT-BR, Spanish, French',
    impact: '+40% sales in LATAM',
    votes: 4200,
    timeframe: '3 months'
  },
  {
    title: 'Void Chronicles',
    genre: 'Narrative Adventure',
    outcome: 'JP + KR localization',
    languages: 'Japanese, Korean',
    impact: 'SEA expansion successful',
    votes: 3500,
    timeframe: '2 months'
  },
  {
    title: 'Shadowrun Legacy',
    genre: 'Indie Roguelike',
    outcome: 'Community patch went official',
    languages: 'Multiple languages',
    impact: 'Fans now on studio payroll',
    votes: 2800,
    timeframe: '4 months'
  },
];

const faqs = [
  {
    question: 'How is this different from asking on Reddit or forums?',
    answer: "Reddit posts get buried. We organize demand across platforms and turn it into data packages that studios actually review. Think of it as aggregating all those scattered forum posts into one professional pitch.",
  },
  {
    question: 'Does this actually work?',
    answer: "We've helped ship 25+ localizations. Can't guarantee every campaign succeeds, but we've got a track record. Check the success stories - these are real games that got localized because the community showed up.",
  },
  {
    question: 'What makes a campaign successful?',
    answer: "Vote count matters, but so does showing you'll actually buy it. We track ownership data, purchase intent, and regional demographics. It's about quality data, not just raw numbers.",
  },
  {
    question: 'Can I help translate?',
    answer: "Yeah! When devs are interested but budget-constrained, we connect them with community translators. Some of our members have landed actual industry jobs this way.",
  },
  {
    question: 'What kind of games do you focus on?',
    answer: 'Mostly indie and mid-size studios who want to localize but need proof of demand. JRPGs, visual novels, narrative games, story-heavy indies are our bread and butter.',
  },
];

export function Players() {
  return (
    <div className="min-h-screen bg-[#1b2838]">
      <Navigation />
      
      {/* Hero Section - Steam/Discord inspired */}
      <section className="relative py-16 px-6 bg-gradient-to-br from-[#1b2838] via-[#2a475e] to-[#1b2838] overflow-hidden">
        {/* Subtle noise texture */}
        <div className="absolute inset-0 opacity-[0.015]" style={{
          backgroundImage: `url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' /%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' /%3E%3C/svg%3E")`,
        }} />
        
        <div className="container mx-auto max-w-6xl relative z-10">
          <div className="max-w-4xl">
            <motion.div
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.4 }}
            >
              {/* Community badge */}
              <div className="inline-flex items-center gap-2 bg-[#171a21] px-3 py-1.5 mb-6">
                <div className="w-2 h-2 bg-[#66c0f4] rounded-full animate-pulse" />
                <span className="text-[#c7d5e0] text-sm font-medium">5,247 members online</span>
              </div>
              
              <h1 className="text-5xl md:text-6xl font-black text-white mb-4 leading-tight">
                Get your favorite games
                <br />
                <span className="text-[#66c0f4]">in your language</span>
              </h1>
              
              <p className="text-xl text-[#c7d5e0] mb-8 leading-relaxed">
                Vote for games you want localized. We show developers there's real demand 
                in your region. It's like an upvote, but for getting devs to actually listen.
              </p>
              
              <div className="flex flex-wrap gap-3 mb-8">
                <Button className="bg-[#5c7e10] hover:bg-[#6d9513] text-white px-6 py-5 font-bold">
                  <ArrowUp className="mr-2 w-4 h-4" />
                  Browse campaigns
                </Button>
                
                <Button className="bg-[#417a9b] hover:bg-[#66c0f4] text-white px-6 py-5 font-bold">
                  <MessageCircle className="mr-2 w-4 h-4" />
                  Join Discord
                </Button>
              </div>

              {/* Quick stats */}
              <div className="flex flex-wrap gap-6 text-sm">
                <div className="flex items-center gap-2">
                  <Trophy className="w-4 h-4 text-[#ffa500]" />
                  <span className="text-[#8f98a0]">25 successful campaigns</span>
                </div>
                <div className="flex items-center gap-2">
                  <Globe2 className="w-4 h-4 text-[#66c0f4]" />
                  <span className="text-[#8f98a0]">40+ languages</span>
                </div>
                <div className="flex items-center gap-2">
                  <Users className="w-4 h-4 text-[#5c7e10]" />
                  <span className="text-[#8f98a0]">5,000+ members</span>
                </div>
              </div>
            </motion.div>
          </div>
        </div>
      </section>

      {/* Active Campaigns - Reddit/Steam style cards */}
      <section className="py-12 px-6 bg-[#171a21]">
        <div className="container mx-auto max-w-7xl">
          <div className="mb-8">
            <h2 className="text-3xl font-black text-white mb-2">
              Active campaigns
            </h2>
            <p className="text-[#8f98a0]">
              Help these games reach your region
            </p>
          </div>
          
          <div className="grid lg:grid-cols-3 gap-5">
            {activeCampaigns.map((campaign, i) => (
              <motion.div
                key={i}
                initial={{ opacity: 0, y: 15 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ delay: i * 0.1 }}
                className="bg-[#1b2838] hover:bg-[#25374e] transition-colors border-t border-[#2a475e] group"
              >
                {/* Game image */}
                <div className="relative h-44 overflow-hidden">
                  <ImageWithFallback
                    src={campaign.image}
                    alt={campaign.title}
                    className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                  />
                  
                  {campaign.trending && (
                    <div className="absolute top-2 left-2">
                      <div className="flex items-center gap-1 bg-[#ff6b2b] px-2 py-1 text-xs font-bold text-white">
                        <TrendingUp className="w-3 h-3" />
                        HOT
                      </div>
                    </div>
                  )}
                  
                  {/* Gradient overlay */}
                  <div className="absolute inset-0 bg-gradient-to-t from-[#1b2838] via-transparent to-transparent opacity-60" />
                </div>

                <div className="p-4">
                  {/* Title & Genre */}
                  <h3 className="text-xl font-bold text-white mb-1">{campaign.title}</h3>
                  <p className="text-sm text-[#66c0f4] mb-0.5">{campaign.genre}</p>
                  <p className="text-xs text-[#8f98a0] mb-3">by {campaign.developer}</p>

                  {/* Upvote style progress */}
                  <div className="flex items-center gap-3 mb-3">
                    <div className="flex items-center gap-1.5">
                      <div className="flex flex-col items-center">
                        <div className="w-8 h-8 bg-[#2a475e] hover:bg-[#66c0f4] transition-colors flex items-center justify-center cursor-pointer">
                          <ArrowUp className="w-4 h-4 text-[#c7d5e0]" />
                        </div>
                      </div>
                      <div>
                        <div className="text-lg font-black text-white">{campaign.votes.toLocaleString()}</div>
                        <div className="text-xs text-[#8f98a0]">votes</div>
                      </div>
                    </div>
                    
                    <div className="flex-1">
                      <div className="text-xs text-[#8f98a0] mb-1">Goal: {campaign.target.toLocaleString()}</div>
                      <div className="h-1.5 bg-[#0e1419] overflow-hidden">
                        <motion.div 
                          className="h-full bg-gradient-to-r from-[#5c7e10] to-[#6d9513]"
                          initial={{ width: 0 }}
                          whileInView={{ width: `${(campaign.votes / campaign.target) * 100}%` }}
                          viewport={{ once: true }}
                          transition={{ duration: 1, delay: i * 0.2 }}
                        />
                      </div>
                    </div>
                  </div>

                  {/* Languages */}
                  <div className="flex flex-wrap gap-1.5 mb-3">
                    {campaign.languages.slice(0, 3).map((lang, idx) => (
                      <span key={idx} className="text-xs bg-[#2a475e] text-[#c7d5e0] px-2 py-0.5">
                        {lang}
                      </span>
                    ))}
                  </div>

                  {/* Status & Comments */}
                  <div className="flex items-center justify-between pt-3 border-t border-[#2a475e]">
                    <div className="flex items-center gap-1.5 text-xs text-[#5c7e10]">
                      <CheckCircle2 className="w-3.5 h-3.5" />
                      <span className="font-medium">{campaign.status}</span>
                    </div>
                    <div className="flex items-center gap-1.5 text-xs text-[#8f98a0]">
                      <MessageSquare className="w-3.5 h-3.5" />
                      <span>{campaign.comments}</span>
                    </div>
                  </div>
                </div>
              </motion.div>
            ))}
          </div>

          <div className="mt-6">
            <Button variant="outline" className="border-[#2a475e] bg-[#2a475e] hover:bg-[#417a9b] text-[#c7d5e0] font-bold">
              View all 150+ campaigns
              <ChevronRight className="ml-2 w-4 h-4" />
            </Button>
          </div>
        </div>
      </section>

      {/* How it works - Simple */}
      <section className="py-12 px-6 bg-[#1b2838]">
        <div className="container mx-auto max-w-5xl">
          <div className="mb-10">
            <h2 className="text-3xl font-black text-white mb-2">
              How it works
            </h2>
            <p className="text-[#8f98a0]">
              Three steps from vote to localization
            </p>
          </div>

          <div className="grid md:grid-cols-3 gap-6">
            {[
              {
                icon: ArrowUp,
                title: 'Vote',
                description: 'Find a game you want in your language. Hit that upvote.',
              },
              {
                icon: BarChart3,
                title: 'We pitch',
                description: 'We turn votes into professional data and present it to devs.',
              },
              {
                icon: CheckCircle2,
                title: 'Track',
                description: 'Follow progress and celebrate when it ships.',
              },
            ].map((step, i) => (
              <motion.div
                key={i}
                initial={{ opacity: 0, y: 15 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ delay: i * 0.1 }}
                className="bg-[#0e1419] p-6 border-l-2 border-[#66c0f4]"
              >
                <step.icon className="w-8 h-8 text-[#66c0f4] mb-3" />
                <h3 className="text-xl font-bold text-white mb-2">{step.title}</h3>
                <p className="text-[#8f98a0] leading-relaxed">{step.description}</p>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Regions */}
      <section className="py-12 px-6 bg-[#171a21]">
        <div className="container mx-auto max-w-6xl">
          <div className="mb-8">
            <h2 className="text-3xl font-black text-white mb-2">
              Regions we focus on
            </h2>
            <p className="text-[#8f98a0]">
              Huge gaming markets often left out
            </p>
          </div>

          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
            {targetMarkets.map((market, i) => (
              <motion.div
                key={i}
                initial={{ opacity: 0, y: 15 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ delay: i * 0.08 }}
                className="bg-[#1b2838] hover:bg-[#2a475e] transition-colors p-5 border-t border-[#2a475e]"
              >
                <div className="flex items-center gap-2 mb-3">
                  <span className="text-2xl">{market.flag}</span>
                  <span className="text-xs bg-[#2a475e] text-[#c7d5e0] px-2 py-0.5 font-bold">
                    {market.code}
                  </span>
                </div>
                
                <h3 className="text-lg font-bold text-white mb-1">{market.region}</h3>
                <p className="text-xs text-[#8f98a0] font-mono mb-2">{market.languages}</p>
                
                <div className="flex items-center gap-1.5 text-sm text-[#66c0f4]">
                  <Users className="w-3.5 h-3.5" />
                  <span className="font-medium">{market.players}</span>
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Success Stories */}
      <section className="py-12 px-6 bg-gradient-to-br from-[#1b2838] to-[#0e1419]">
        <div className="container mx-auto max-w-6xl">
          <div className="mb-8">
            <h2 className="text-3xl font-black text-white mb-2">
              Success stories
            </h2>
            <p className="text-[#8f98a0]">
              Real campaigns that shipped
            </p>
          </div>
          
          <div className="grid lg:grid-cols-3 gap-5">
            {victories.map((victory, i) => (
              <motion.div
                key={i}
                initial={{ opacity: 0, y: 15 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ delay: i * 0.1 }}
                className="bg-[#1b2838] p-5 border-t-2 border-[#5c7e10]"
              >
                <div className="flex items-center gap-2 mb-3">
                  <div className="w-8 h-8 bg-[#5c7e10] flex items-center justify-center">
                    <Trophy className="w-4 h-4 text-white" />
                  </div>
                  <span className="text-xs bg-[#5c7e10] text-white px-2 py-0.5 font-bold">
                    SHIPPED
                  </span>
                </div>
                
                <h3 className="text-xl font-bold text-white mb-1">{victory.title}</h3>
                <p className="text-sm text-[#66c0f4] mb-3">{victory.genre}</p>
                
                <div className="space-y-2 mb-4">
                  <div className="flex items-start gap-2">
                    <CheckCircle2 className="w-4 h-4 text-[#5c7e10] mt-0.5 flex-shrink-0" />
                    <p className="text-sm text-[#c7d5e0]">{victory.outcome}</p>
                  </div>
                  <div className="flex items-start gap-2">
                    <Languages className="w-4 h-4 text-[#66c0f4] mt-0.5 flex-shrink-0" />
                    <p className="text-sm text-[#8f98a0]">{victory.languages}</p>
                  </div>
                  <div className="flex items-start gap-2">
                    <TrendingUp className="w-4 h-4 text-[#ffa500] mt-0.5 flex-shrink-0" />
                    <p className="text-sm text-[#8f98a0]">{victory.impact}</p>
                  </div>
                </div>

                <div className="pt-3 border-t border-[#2a475e] flex items-center justify-between text-xs text-[#8f98a0]">
                  <span>{victory.votes.toLocaleString()} votes</span>
                  <span>{victory.timeframe}</span>
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-12 px-6 bg-[#171a21]">
        <div className="container mx-auto max-w-4xl">
          <div className="bg-gradient-to-br from-[#2a475e] to-[#1b2838] p-10 text-center border border-[#417a9b]">
            <Gamepad2 className="w-12 h-12 text-[#66c0f4] mx-auto mb-4 opacity-50" />
            
            <h2 className="text-3xl font-black text-white mb-3">
              You shouldn't need to learn English to play good games
            </h2>
            <p className="text-lg text-[#c7d5e0] mb-6 max-w-2xl mx-auto">
              Your vote shows developers there's demand (and revenue) in your region.
            </p>
            
            <Button className="bg-[#66c0f4] hover:bg-[#4e9cc9] text-[#1b2838] px-8 py-6 text-lg font-bold">
              <MessageCircle className="mr-2 w-5 h-5" />
              Join the community
            </Button>
          </div>
        </div>
      </section>
      
      {/* FAQ */}
      <section className="py-12 px-6 bg-[#1b2838]">
        <div className="container mx-auto max-w-4xl">
          <div className="mb-8">
            <h2 className="text-3xl font-black text-white mb-2">
              Common questions
            </h2>
            <p className="text-[#8f98a0]">
              Everything you need to know
            </p>
          </div>
          
          <Accordion type="single" collapsible className="space-y-3">
            {faqs.map((faq, index) => (
              <AccordionItem
                key={index}
                value={`item-${index}`}
                className="bg-[#171a21] border border-[#2a475e] px-5"
              >
                <AccordionTrigger className="text-white hover:text-[#66c0f4] py-4 text-left font-bold">
                  {faq.question}
                </AccordionTrigger>
                <AccordionContent className="text-[#c7d5e0] pb-4 leading-relaxed">
                  {faq.answer}
                </AccordionContent>
              </AccordionItem>
            ))}
          </Accordion>
        </div>
      </section>
      
      <Footer />
    </div>
  );
}