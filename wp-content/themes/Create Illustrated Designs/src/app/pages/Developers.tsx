import { Navigation } from '../components/Navigation';
import { Footer } from '../components/Footer';
import { 
  Globe, 
  CheckCircle2, 
  FileCheck, 
  BookOpen, 
  TestTube, 
  FileText,
  Store,
  Wrench,
  ClipboardList,
  Users,
  ArrowRight,
  Upload,
  Zap,
  Target,
  Shield,
  TrendingUp,
  Award,
  Code
} from 'lucide-react';
import { motion } from 'motion/react';
import { ImageWithFallback } from '../components/figma/ImageWithFallback';
import { Badge } from '../components/ui/badge';
import { Button } from '../components/ui/button';
import { Input } from '../components/ui/input';
import { Textarea } from '../components/ui/textarea';
import { Label } from '../components/ui/label';

const whyUsPoints = [
  {
    icon: Users,
    title: 'Professional Localization',
    description: 'Native-speaking translators with gaming expertise, editing, and LQA services.',
  },
  {
    icon: TrendingUp,
    title: 'Player Community',
    description: 'Access to a growing community of players actively interested in localized titles.',
  },
  {
    icon: Target,
    title: 'Proven Demand',
    description: 'Your games are introduced to players who care about localization and want to experience them.',
  },
];

const services = [
  {
    icon: Globe,
    title: 'Translation',
    description: 'Native-speaking translators with gaming expertise',
  },
  {
    icon: FileCheck,
    title: 'Editing',
    description: 'Consistency, quality, and polish',
  },
  {
    icon: TestTube,
    title: 'LQA',
    description: 'In-context testing before launch',
  },
  {
    icon: ClipboardList,
    title: 'PM',
    description: 'Single point of contact',
  },
];

const languages = [
  'Chinese (Simplified)', 'Chinese (Traditional)', 'French', 'German',
  'Italian', 'Japanese', 'Korean', 'Polish',
  'Portuguese (Brazil)', 'Spanish (Spain)', 'Spanish (LATAM)', 'Turkish',
];

const processSteps = [
  { title: 'Scope', description: 'Requirements & targets', icon: Target },
  { title: 'Prep', description: 'Glossary + Style Guide', icon: BookOpen },
  { title: 'Translate', description: 'Professional work', icon: Globe },
  { title: 'LQA', description: 'Quality assurance', icon: Shield },
  { title: 'Deliver', description: 'Final files & support', icon: Zap },
];

const gamesWorkedOn = [
  {
    title: 'Fantasy Quest',
    image: 'https://images.unsplash.com/photo-1635541860441-72b745aa7124?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxmYW50YXN5JTIwUlBHJTIwZ2FtZSUyMGNvdmVyJTIwYXJ0fGVufDF8fHx8MTc3MjY4Mzk1MXww&ixlib=rb-4.1.0&q=80&w=1080',
    languages: '12 languages',
  },
  {
    title: 'Cyber Warriors',
    image: 'https://images.unsplash.com/photo-1580327332925-a10e6cb11baa?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxhY3Rpb24lMjB2aWRlbyUyMGdhbWUlMjBjb3ZlcnxlbnwxfHx8fDE3NzI2ODM5NTF8MA&ixlib=rb-4.1.0&q=80&w=1080',
    languages: '8 languages',
  },
  {
    title: 'Pixel Legends',
    image: 'https://images.unsplash.com/photo-1660507224958-729c18ba1277?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxpbmRpZSUyMGdhbWUlMjBwaXhlbCUyMGFydHxlbnwxfHx8fDE3NzI2Nzk5MDR8MA&ixlib=rb-4.1.0&q=80&w=1080',
    languages: '6 languages',
  },
  {
    title: 'Empire Simulator',
    image: 'https://images.unsplash.com/photo-1666467831470-8f26f983391f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzaW11bGF0aW9uJTIwZ2FtZSUyMHNjcmVlbnNob3R8ZW58MXx8fHwxNzcyNjgzOTUyfDA&ixlib=rb-4.1.0&q=80&w=1080',
    languages: '10 languages',
  },
  {
    title: 'Tactical Command',
    image: 'https://images.unsplash.com/photo-1763107241634-b24671124bc3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzdHJhdGVneSUyMGdhbWUlMjBpbnRlcmZhY2V8ZW58MXx8fHwxNzcyNjgzOTUyfDA&ixlib=rb-4.1.0&q=80&w=1080',
    languages: '9 languages',
  },
  {
    title: 'Adventure Odyssey',
    image: 'https://images.unsplash.com/photo-1765706729543-348de9e073b1?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxhZHZlbnR1cmUlMjBnYW1lJTIwbGFuZHNjYXBlfGVufDF8fHx8MTc3MjY0MDc4OHww&ixlib=rb-4.1.0&q=80&w=1080',
    languages: '11 languages',
  },
];

export function Developers() {
  return (
    <div className="min-h-screen bg-gradient-to-br from-gray-950 via-indigo-950 to-purple-950 relative overflow-x-hidden">
      <Navigation />
      
      {/* Hero Section - Professional & Structured */}
      <section className="relative py-24 px-6 overflow-hidden">
        {/* Tech-inspired grid background */}
        <div className="absolute inset-0">
          <div className="absolute inset-0 opacity-10">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                  <path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" strokeWidth="1" className="text-purple-400"/>
                </pattern>
              </defs>
              <rect width="100%" height="100%" fill="url(#grid)"/>
            </svg>
          </div>
          
          {/* Diagonal tech stripes */}
          <div className="absolute top-0 right-0 w-1/2 h-full opacity-5">
            {[...Array(10)].map((_, i) => (
              <div
                key={i}
                className="absolute h-full w-1 bg-purple-400"
                style={{
                  left: `${i * 10}%`,
                  transform: 'skewX(-15deg)',
                }}
              />
            ))}
          </div>
        </div>

        <div className="container mx-auto max-w-7xl relative z-10">
          <div className="grid lg:grid-cols-2 gap-12 items-center">
            <motion.div
              initial={{ opacity: 0, x: -30 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ duration: 0.6 }}
            >
              <motion.div
                initial={{ opacity: 0, y: -10 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ delay: 0.2 }}
                className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-purple-500/20 border border-purple-400/30 text-purple-200 text-sm mb-6 font-bold"
              >
                <Code className="w-4 h-4" />
                <span>PRODUCTION-READY LOCALIZATION</span>
              </motion.div>
              
              <h1 className="text-5xl md:text-7xl font-black mb-6 leading-tight text-white">
                Game localization
                <br />
                <span className="bg-gradient-to-r from-purple-400 to-indigo-400 bg-clip-text text-transparent">
                  that ships.
                </span>
              </h1>
              
              <p className="text-xl text-purple-200 mb-4 leading-relaxed">
                Translation, editing, and LQA for studios shipping globally — streamlined workflow, single point of contact.
              </p>
              
              <div className="flex items-start gap-3 mb-8 p-4 border-l-4 border-purple-500 bg-purple-900/20">
                <TrendingUp className="w-5 h-5 text-purple-400 mt-1 flex-shrink-0" />
                <p className="text-sm text-purple-300 font-semibold">
                  60%+ of Steam users browse in non-English languages — localization is a growth multiplier
                </p>
              </div>
              
              <div className="flex flex-wrap gap-4">
                <Button className="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-8 py-6 text-lg font-bold shadow-xl shadow-purple-500/50 rounded-2xl">
                  REQUEST QUOTE
                  <ArrowRight className="ml-2 w-5 h-5" />
                </Button>
                <Button variant="outline" className="border-2 border-purple-400/50 text-purple-200 hover:bg-purple-900/30 px-8 py-6 text-lg font-bold rounded-2xl">
                  EMAIL US
                </Button>
              </div>
            </motion.div>
            
            <motion.div
              initial={{ opacity: 0, x: 30 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ duration: 0.6, delay: 0.2 }}
              className="relative"
            >
              <div className="absolute inset-0 bg-gradient-to-br from-purple-500/30 to-indigo-500/30 rounded-[3rem] blur-3xl" />
              <div className="relative">
                <ImageWithFallback
                  src="https://images.unsplash.com/photo-1732203971761-e9d4a6f5e93f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtb2Rlcm4lMjBzb2Z0d2FyZSUyMGRhc2hib2FyZCUyMGludGVyZmFjZXxlbnwxfHx8fDE3NzI0MTk1ODB8MA&ixlib=rb-4.1.0&q=80&w=1080"
                  alt="Localization dashboard"
                  className="w-full h-auto rounded-[3rem] shadow-2xl"
                />
              </div>
            </motion.div>
          </div>
        </div>
      </section>
      
      {/* Why Us - Bridge between development and players */}
      <section className="py-32 px-6 relative bg-gradient-to-b from-purple-950/50 to-transparent overflow-hidden">
        {/* Floating orbs background effect */}
        <motion.div
          className="absolute top-20 left-10 w-64 h-64 rounded-full bg-purple-500/10 blur-3xl"
          animate={{
            y: [0, 50, 0],
            x: [0, 30, 0],
          }}
          transition={{ duration: 8, repeat: Infinity }}
        />
        <motion.div
          className="absolute bottom-20 right-10 w-96 h-96 rounded-full bg-indigo-500/10 blur-3xl"
          animate={{
            y: [0, -40, 0],
            x: [0, -20, 0],
          }}
          transition={{ duration: 10, repeat: Infinity, delay: 1 }}
        />
        
        {/* Animated grid lines */}
        <div className="absolute inset-0 opacity-5">
          <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <pattern id="whyus-grid" width="50" height="50" patternUnits="userSpaceOnUse">
                <path d="M 50 0 L 0 0 0 50" fill="none" stroke="currentColor" strokeWidth="1" className="text-purple-400"/>
              </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#whyus-grid)"/>
          </svg>
        </div>
        
        {/* Floating particles */}
        <div className="absolute inset-0">
          {[...Array(12)].map((_, i) => (
            <motion.div
              key={i}
              className="absolute w-1 h-1 bg-purple-400/40 rounded-full"
              style={{
                left: `${10 + i * 8}%`,
                top: `${15 + (i % 4) * 20}%`,
              }}
              animate={{
                y: [0, -40, 0],
                opacity: [0.2, 0.6, 0.2],
                scale: [1, 1.5, 1],
              }}
              transition={{
                duration: 4 + i * 0.3,
                repeat: Infinity,
                delay: i * 0.2,
              }}
            />
          ))}
        </div>
        
        <div className="container mx-auto max-w-6xl relative z-10">
          {/* Main Title with glow effect */}
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="text-center mb-20"
          >
            <motion.h2 
              className="text-4xl md:text-5xl font-black mb-12 text-white relative inline-block"
              animate={{
                textShadow: [
                  "0 0 20px rgba(168, 85, 247, 0.4)",
                  "0 0 40px rgba(168, 85, 247, 0.6)",
                  "0 0 20px rgba(168, 85, 247, 0.4)",
                ],
              }}
              transition={{ duration: 3, repeat: Infinity }}
            >
              Why Us?
              {/* Animated underline */}
              <motion.div
                className="absolute -bottom-2 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-purple-500 to-transparent"
                animate={{
                  opacity: [0.5, 1, 0.5],
                  scaleX: [0.8, 1, 0.8],
                }}
                transition={{ duration: 2, repeat: Infinity }}
              />
            </motion.h2>
            
            {/* Main value proposition - More compact */}
            <motion.div
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ delay: 0.2 }}
              className="relative max-w-4xl mx-auto"
            >
              {/* Animated border glow */}
              <motion.div
                className="absolute -inset-4 rounded-3xl opacity-30"
                style={{
                  background: 'linear-gradient(45deg, #a855f7, #6366f1, #a855f7)',
                  backgroundSize: '200% 200%',
                }}
                animate={{
                  backgroundPosition: ['0% 50%', '100% 50%', '0% 50%'],
                }}
                transition={{ duration: 5, repeat: Infinity }}
              />
              
              <div className="relative bg-gradient-to-br from-purple-900/60 to-indigo-900/60 backdrop-blur-xl border-2 border-purple-400/40 rounded-3xl p-8 shadow-2xl">
                <p className="text-lg md:text-xl text-white font-bold leading-relaxed mb-8">
                  Gamer Minds combines professional game localization with a growing community of players interested in localized titles.
                </p>
                
                {/* Animated divider */}
                <motion.div 
                  className="h-1 w-24 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-full mx-auto my-8"
                  animate={{
                    width: ['6rem', '8rem', '6rem'],
                    opacity: [0.6, 1, 0.6],
                  }}
                  transition={{ duration: 2, repeat: Infinity }}
                />
                
                <p className="text-base md:text-lg text-purple-100 leading-relaxed mb-6">
                  When studios work with us, they are not just receiving translation services. Their games are also introduced to a community of players who actively follow localization efforts and care about seeing games become available in their language.
                </p>
                
                <p className="text-base md:text-lg text-purple-100 leading-relaxed">
                  This creates a unique bridge between developers and international players. Localization is not just delivered as files, but shared with an audience that is excited to experience the game.
                </p>
              </div>
            </motion.div>
          </motion.div>
          
          {/* Three Key Points - More compact with enhanced effects */}
          <div className="grid md:grid-cols-3 gap-8 mt-20">
            {whyUsPoints.map((point, index) => (
              <motion.div
                key={index}
                initial={{ opacity: 0, y: 50, rotate: -3 }}
                whileInView={{ opacity: 1, y: 0, rotate: 0 }}
                viewport={{ once: true }}
                transition={{ delay: index * 0.15 }}
                className="relative group"
                style={{
                  marginTop: index === 1 ? '2rem' : index === 2 ? '-1rem' : '0',
                }}
              >
                {/* Diagonal accent line with animation */}
                <motion.div 
                  className="absolute -left-4 top-0 bottom-0 w-1 bg-gradient-to-b from-purple-500 to-indigo-500 transform -skew-y-3"
                  animate={{
                    opacity: [0.6, 1, 0.6],
                  }}
                  transition={{ duration: 2, repeat: Infinity, delay: index * 0.3 }}
                />
                
                {/* Glowing background effect on hover - enhanced */}
                <motion.div
                  className="absolute -inset-4 bg-gradient-to-br from-purple-600/20 to-indigo-600/20 rounded-3xl blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                />
                
                {/* Corner accent animations */}
                <div className="absolute -top-2 -right-2 w-4 h-4 border-t-2 border-r-2 border-purple-400/50 group-hover:border-purple-300 transition-colors" />
                <div className="absolute -bottom-2 -left-2 w-4 h-4 border-b-2 border-l-2 border-indigo-400/50 group-hover:border-indigo-300 transition-colors" />
                
                <motion.div 
                  className="relative bg-gradient-to-br from-purple-900/50 to-indigo-900/50 backdrop-blur-xl border-2 border-purple-400/30 rounded-2xl p-8 hover:border-purple-300/60 transition-all transform hover:-translate-y-2 hover:rotate-1 shadow-2xl"
                  whileHover={{
                    boxShadow: "0 0 40px rgba(168, 85, 247, 0.4)",
                  }}
                >
                  <div className="relative inline-block mb-6">
                    {/* Rotating ring effect */}
                    <motion.div 
                      className="absolute -inset-2 rounded-2xl border-2 border-purple-400/20"
                      animate={{ rotate: 360 }}
                      transition={{ duration: 8, repeat: Infinity, ease: "linear" }}
                    />
                    
                    <motion.div 
                      className="absolute -inset-2 bg-gradient-to-br from-purple-500/30 to-indigo-500/30 rounded-2xl blur-md opacity-0 group-hover:opacity-100 transition-opacity"
                    />
                    
                    <div className="relative w-20 h-20 rounded-xl bg-gradient-to-br from-purple-600 to-indigo-600 flex items-center justify-center shadow-xl transform group-hover:scale-110 transition-transform border-2 border-purple-400/30">
                      <point.icon className="w-10 h-10 text-white" strokeWidth={2} />
                    </div>
                  </div>
                  
                  <h3 className="text-2xl font-black text-white mb-3 leading-tight">{point.title}</h3>
                  <p className="text-lg text-purple-100 font-medium leading-relaxed">{point.description}</p>
                  
                  {/* Shine effect on hover */}
                  <motion.div
                    className="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 pointer-events-none"
                    style={{
                      background: 'linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.05) 50%, transparent 70%)',
                      backgroundSize: '200% 200%',
                    }}
                    animate={{
                      backgroundPosition: ['-200% 0%', '200% 0%'],
                    }}
                    transition={{
                      duration: 1.5,
                      repeat: Infinity,
                      repeatDelay: 1,
                    }}
                  />
                </motion.div>
              </motion.div>
            ))}
          </div>
        </div>
      </section>
      
      {/* Services - Circular flow */}
      <section className="py-20 px-6 relative overflow-hidden">
        {/* Animated background particles */}
        <div className="absolute inset-0">
          {[...Array(6)].map((_, i) => (
            <motion.div
              key={i}
              className="absolute w-2 h-2 bg-purple-400/30 rounded-full"
              style={{
                left: `${15 + i * 15}%`,
                top: `${20 + (i % 3) * 20}%`,
              }}
              animate={{
                y: [0, -30, 0],
                opacity: [0.3, 0.8, 0.3],
              }}
              transition={{
                duration: 3 + i * 0.5,
                repeat: Infinity,
                delay: i * 0.2,
              }}
            />
          ))}
        </div>
        
        <div className="container mx-auto max-w-6xl relative z-10">
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="text-4xl md:text-5xl font-black mb-16 text-center text-white"
          >
            SERVICES
          </motion.h2>
          
          {/* Alternating left-right layout with connecting lines */}
          <div className="space-y-16">
            {services.map((service, i) => {
              const isEven = i % 2 === 0;
              
              return (
                <motion.div
                  key={i}
                  initial={{ opacity: 0, x: isEven ? -50 : 50 }}
                  whileInView={{ opacity: 1, x: 0 }}
                  viewport={{ once: true }}
                  transition={{ delay: i * 0.1 }}
                  className={`flex items-center gap-8 ${isEven ? 'flex-row' : 'flex-row-reverse'}`}
                >
                  {/* Icon with effects */}
                  <div className="relative group flex-shrink-0">
                    {/* Pulsing background glow */}
                    <motion.div
                      className="absolute -inset-8 bg-gradient-to-br from-purple-500/20 to-indigo-500/20 rounded-full blur-2xl"
                      animate={{
                        scale: [1, 1.2, 1],
                        opacity: [0.3, 0.6, 0.3],
                      }}
                      transition={{
                        duration: 3,
                        repeat: Infinity,
                        delay: i * 0.3,
                      }}
                    />
                    
                    {/* Rotating border ring */}
                    <motion.div
                      className="absolute -inset-4 rounded-full border-2 border-purple-400/30"
                      animate={{ rotate: 360 }}
                      transition={{ duration: 10, repeat: Infinity, ease: "linear" }}
                    />
                    
                    <div className="relative w-32 h-32 rounded-full bg-gradient-to-br from-purple-600 to-indigo-600 flex items-center justify-center shadow-2xl shadow-purple-500/50 group-hover:shadow-purple-500/80 transition-all transform group-hover:scale-110 border-4 border-purple-400/30">
                      <service.icon className="w-16 h-16 text-white" strokeWidth={1.5} />
                    </div>
                    
                    {/* Number badge */}
                    <div className="absolute -top-2 -right-2 w-12 h-12 rounded-full bg-gradient-to-br from-white to-purple-100 text-purple-600 flex items-center justify-center font-black text-xl shadow-lg border-2 border-purple-300">
                      {i + 1}
                    </div>
                  </div>
                  
                  {/* Connecting line */}
                  <div className={`hidden md:block flex-shrink-0 w-24 h-1 bg-gradient-to-${isEven ? 'r' : 'l'} from-purple-500 to-indigo-500 rounded-full relative`}>
                    <motion.div
                      className="absolute inset-0 bg-gradient-to-r from-transparent via-white to-transparent rounded-full"
                      animate={{
                        x: isEven ? [-100, 100] : [100, -100],
                      }}
                      transition={{
                        duration: 2,
                        repeat: Infinity,
                        delay: i * 0.5,
                      }}
                    />
                  </div>
                  
                  {/* Content card */}
                  <motion.div
                    className="flex-1 relative group"
                    whileHover={{ scale: 1.02 }}
                    transition={{ duration: 0.3 }}
                  >
                    {/* Diagonal accent */}
                    <div className={`absolute ${isEven ? '-left-3' : '-right-3'} top-0 bottom-0 w-1 bg-gradient-to-b from-purple-500 to-indigo-500 transform skew-y-3`} />
                    
                    {/* Hover glow */}
                    <motion.div
                      className="absolute -inset-4 bg-gradient-to-br from-purple-600/10 to-indigo-600/10 rounded-3xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity"
                    />
                    
                    <div className={`relative bg-gradient-to-br from-purple-900/30 to-indigo-900/30 backdrop-blur-sm border-2 border-purple-400/30 rounded-2xl p-6 hover:border-purple-300/60 transition-all shadow-xl ${isEven ? 'text-left' : 'text-right'}`}>
                      <h3 className="text-3xl font-black text-white mb-3">{service.title}</h3>
                      <p className="text-purple-200 font-medium text-lg leading-relaxed">{service.description}</p>
                    </div>
                  </motion.div>
                </motion.div>
              );
            })}
          </div>
          
          {/* Additional services badges */}
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="mt-16 flex flex-wrap justify-center gap-4"
          >
            <motion.div whileHover={{ scale: 1.05, y: -2 }}>
              <Badge className="px-6 py-4 bg-purple-600/30 border-2 border-purple-400/50 text-purple-200 font-bold text-base hover:bg-purple-600/40 transition-all shadow-lg">
                <Store className="w-5 h-5 mr-2" />
                Store page localization
              </Badge>
            </motion.div>
            <motion.div whileHover={{ scale: 1.05, y: -2 }}>
              <Badge className="px-6 py-4 bg-indigo-600/30 border-2 border-indigo-400/50 text-indigo-200 font-bold text-base hover:bg-indigo-600/40 transition-all shadow-lg">
                <Wrench className="w-5 h-5 mr-2" />
                Post-launch support
              </Badge>
            </motion.div>
          </motion.div>
        </div>
      </section>
      
      {/* Games portfolio - Diagonal layout */}
      <section className="py-20 px-6 relative overflow-hidden">
        {/* Animated background gradient orbs */}
        <motion.div
          className="absolute top-1/4 left-1/4 w-96 h-96 rounded-full bg-purple-500/10 blur-3xl"
          animate={{
            scale: [1, 1.2, 1],
            x: [0, 50, 0],
          }}
          transition={{ duration: 12, repeat: Infinity }}
        />
        <motion.div
          className="absolute bottom-1/4 right-1/4 w-96 h-96 rounded-full bg-indigo-500/10 blur-3xl"
          animate={{
            scale: [1.2, 1, 1.2],
            x: [0, -50, 0],
          }}
          transition={{ duration: 15, repeat: Infinity, delay: 2 }}
        />
        
        <div className="container mx-auto max-w-7xl relative z-10">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="text-center mb-16"
          >
            <h2 className="text-4xl md:text-5xl font-black mb-4 text-white">
              GAMES WE WORKED ON
            </h2>
            <p className="text-purple-300 text-xl font-bold">
              Trusted by studios across multiple genres
            </p>
          </motion.div>
          
          {/* Clean grid with hover effects */}
          <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            {gamesWorkedOn.map((game, i) => (
              <motion.div
                key={i}
                initial={{ opacity: 0, y: 30, scale: 0.9 }}
                whileInView={{ opacity: 1, y: 0, scale: 1 }}
                viewport={{ once: true }}
                transition={{ delay: i * 0.05 }}
                className="relative group"
              >
                {/* Glowing border effect on hover */}
                <motion.div
                  className="absolute -inset-1 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl opacity-0 group-hover:opacity-50 blur-lg transition-opacity duration-500"
                />
                
                <motion.div
                  whileHover={{ y: -8, rotate: i % 2 === 0 ? 2 : -2 }}
                  transition={{ duration: 0.3 }}
                  className="relative aspect-[3/4] rounded-2xl overflow-hidden border-2 border-purple-400/30 group-hover:border-purple-300/70 transition-all shadow-xl group-hover:shadow-2xl group-hover:shadow-purple-500/30"
                >
                  <ImageWithFallback
                    src={game.image}
                    alt={game.title}
                    className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                  />
                  
                  {/* Gradient overlay */}
                  <div className="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-950/60 to-transparent" />
                  
                  {/* Shine effect on hover */}
                  <motion.div
                    className="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity"
                    style={{
                      background: 'linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%)',
                    }}
                    animate={{
                      x: ['-100%', '100%'],
                    }}
                    transition={{
                      duration: 1.5,
                      repeat: Infinity,
                      repeatDelay: 2,
                    }}
                  />
                  
                  {/* Content */}
                  <div className="absolute bottom-0 left-0 right-0 p-4">
                    <p className="text-white font-black text-sm mb-1 leading-tight">{game.title}</p>
                    <p className="text-purple-300 text-xs font-semibold">{game.languages}</p>
                  </div>
                </motion.div>
              </motion.div>
            ))}
          </div>
        </div>
      </section>
      
      {/* Process - Horizontal flow */}
      <section className="py-20 px-6 hidden">
        <div className="container mx-auto max-w-7xl">
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="text-4xl md:text-5xl font-black mb-16 text-center text-white"
          >
            OUR PROCESS
          </motion.h2>
          
          <div className="relative">
            {/* Connection line */}
            <div className="hidden md:block absolute top-16 left-0 right-0 h-1 bg-gradient-to-r from-purple-600 via-indigo-600 to-purple-600 rounded-full" />
            
            <div className="grid grid-cols-1 md:grid-cols-5 gap-8">
              {processSteps.map((step, i) => (
                <motion.div
                  key={i}
                  initial={{ opacity: 0, y: 30 }}
                  whileInView={{ opacity: 1, y: 0 }}
                  viewport={{ once: true }}
                  transition={{ delay: i * 0.1 }}
                  className="relative text-center"
                >
                  <div className="w-32 h-32 rounded-full bg-gradient-to-br from-purple-600 to-indigo-600 flex flex-col items-center justify-center mx-auto mb-6 shadow-2xl shadow-purple-500/50 border-4 border-gray-950 z-10 relative transform hover:scale-110 transition-transform">
                    <step.icon className="w-10 h-10 text-white mb-1" />
                    <span className="text-2xl font-black text-white">{i + 1}</span>
                  </div>
                  <h3 className="text-xl font-black text-white mb-2">{step.title}</h3>
                  <p className="text-purple-300 font-medium text-sm">{step.description}</p>
                </motion.div>
              ))}
            </div>
          </div>
        </div>
      </section>
      
      {/* Languages - Tag cloud style */}
      <section className="py-20 px-6 relative">
        <div className="container mx-auto max-w-6xl">
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="text-4xl md:text-5xl font-black mb-12 text-center text-white"
          >
            LANGUAGES
          </motion.h2>
          
          <div className="flex flex-wrap justify-center gap-4">
            {languages.map((lang, i) => (
              <motion.div
                key={i}
                initial={{ opacity: 0, scale: 0.8 }}
                whileInView={{ opacity: 1, scale: 1 }}
                viewport={{ once: true }}
                transition={{ delay: i * 0.03 }}
                whileHover={{ scale: 1.1 }}
              >
                <Badge className="px-6 py-3 bg-gradient-to-br from-purple-600/40 to-indigo-600/40 border-2 border-purple-400/50 text-purple-100 font-bold text-base hover:from-purple-600/60 hover:to-indigo-600/60 transition-all cursor-pointer">
                  {lang}
                </Badge>
              </motion.div>
            ))}
          </div>
        </div>
      </section>
      
      {/* Quote form - Streamlined */}
      <section id="quote" className="py-20 px-6">
        <div className="container mx-auto max-w-3xl">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
          >
            <div className="text-center mb-12">
              <h2 className="text-4xl md:text-5xl font-black mb-4 text-white">
                REQUEST A QUOTE
              </h2>
              <p className="text-purple-300 text-lg font-bold">
                Share wordcount, languages, and deadline
              </p>
            </div>
            
            <div className="bg-purple-900/30 backdrop-blur-xl border-2 border-purple-400/40 rounded-3xl p-8">
              <form className="space-y-6">
                <div className="grid md:grid-cols-2 gap-6">
                  <div>
                    <Label className="text-purple-200 mb-2 block font-bold">Name</Label>
                    <Input className="bg-purple-950/50 border-2 border-purple-400/30 text-white rounded-xl" />
                  </div>
                  <div>
                    <Label className="text-purple-200 mb-2 block font-bold">Studio</Label>
                    <Input className="bg-purple-950/50 border-2 border-purple-400/30 text-white rounded-xl" />
                  </div>
                </div>
                
                <div>
                  <Label className="text-purple-200 mb-2 block font-bold">Email</Label>
                  <Input type="email" className="bg-purple-950/50 border-2 border-purple-400/30 text-white rounded-xl" />
                </div>
                
                <div className="grid md:grid-cols-2 gap-6">
                  <div>
                    <Label className="text-purple-200 mb-2 block font-bold">Wordcount</Label>
                    <Input className="bg-purple-950/50 border-2 border-purple-400/30 text-white rounded-xl" />
                  </div>
                  <div>
                    <Label className="text-purple-200 mb-2 block font-bold">Target Languages</Label>
                    <Input className="bg-purple-950/50 border-2 border-purple-400/30 text-white rounded-xl" />
                  </div>
                </div>
                
                <div>
                  <Label className="text-purple-200 mb-2 block font-bold">Notes</Label>
                  <Textarea rows={4} className="bg-purple-950/50 border-2 border-purple-400/30 text-white rounded-xl" />
                </div>
                
                <Button className="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white py-6 text-lg font-black shadow-xl shadow-purple-500/50 rounded-2xl">
                  SEND REQUEST
                </Button>
                <p className="text-sm text-purple-400 text-center font-semibold">
                  We reply within 1–2 business days. NDAs welcome.
                </p>
              </form>
            </div>
          </motion.div>
        </div>
      </section>
      
      <Footer />
    </div>
  );
}