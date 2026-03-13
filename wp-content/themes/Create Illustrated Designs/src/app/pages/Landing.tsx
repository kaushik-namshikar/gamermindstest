import { Link } from 'react-router';
import { Navigation } from '../components/Navigation';
import { Briefcase, Users, ArrowRight, ChevronDown, X } from 'lucide-react';
import { motion, AnimatePresence } from 'motion/react';
import { useState } from 'react';

export function Landing() {
  const [showExplainer, setShowExplainer] = useState(false);

  return (
    <div className="h-screen flex flex-col overflow-hidden relative bg-black">
      <Navigation />
      
      {/* Two Paths Layout - Yin & Yang Style */}
      <main className="flex-1 flex items-center justify-center relative overflow-hidden">
        {/* Subtle colorless background with minimal effects */}
        <div className="absolute inset-0 bg-gradient-radial from-gray-900/30 via-black to-black" />
        
        {/* Subtle center glow - not aggressive */}
        <div className="absolute inset-0 flex items-center justify-center pointer-events-none">
          <div className="w-96 h-96 rounded-full bg-gradient-radial from-white/5 via-transparent to-transparent" />
        </div>

        {/* DEVELOPER SIDE - LEFT - Slides in from left */}
        <Link to="/developers" className="group flex-1 h-full relative overflow-hidden">
          {/* Diagonal angle overlay */}
          <motion.div
            className="absolute inset-0 z-20 pointer-events-none"
            initial={{ x: '-100%' }}
            animate={{ x: 0 }}
            transition={{ duration: 0.8, ease: "easeOut" }}
          >
            <div 
              className="absolute inset-0 bg-gradient-to-br from-blue-600/15 via-transparent to-transparent"
              style={{
                clipPath: 'polygon(0 0, 60% 0, 40% 100%, 0 100%)',
              }}
            />
            <motion.div 
              className="absolute inset-0 bg-gradient-to-br from-blue-500/25 to-transparent border-r-2 border-blue-400/50"
              style={{
                clipPath: 'polygon(0 0, 55% 0, 35% 100%, 0 100%)',
              }}
              animate={{
                opacity: [0.4, 0.7, 0.4],
              }}
              transition={{
                duration: 3,
                repeat: Infinity,
              }}
            />
          </motion.div>

          {/* Background - subtle gradient */}
          <div className="absolute inset-0 bg-gradient-to-br from-gray-900 via-black to-black" />
          
          {/* Minimal grid pattern */}
          <div className="absolute inset-0 opacity-10">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <pattern id="grid-dev" width="50" height="50" patternUnits="userSpaceOnUse">
                  <path d="M 50 0 L 0 0 0 50" fill="none" stroke="currentColor" strokeWidth="0.5" className="text-blue-400"/>
                </pattern>
              </defs>
              <rect width="100%" height="100%" fill="url(#grid-dev)"/>
            </svg>
          </div>

          {/* Character spotlight */}
          <motion.div 
            className="absolute inset-0 flex items-center justify-center"
            initial={{ opacity: 0, x: -100 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.8, delay: 0.2 }}
          >
            {/* Subtle spotlight */}
            <div className="absolute w-[500px] h-[500px] rounded-full bg-gradient-radial from-blue-500/15 via-blue-500/5 to-transparent" />
            
            {/* Abstract Icon Design */}
            <motion.div 
              className="relative"
              whileHover={{ scale: 1.05 }}
              transition={{ duration: 0.3 }}
            >
              {/* Outer glow ring */}
              <motion.div 
                className="absolute -inset-6 rounded-full bg-gradient-to-br from-blue-500/20 to-blue-600/20 blur-xl"
                animate={{
                  scale: [1, 1.1, 1],
                  opacity: [0.3, 0.5, 0.3]
                }}
                transition={{ duration: 4, repeat: Infinity }}
              />
              
              {/* Icon Circle */}
              <div className="relative w-72 h-72 rounded-full overflow-hidden border-4 border-blue-400/60 shadow-2xl shadow-blue-500/20 bg-gradient-to-br from-blue-900/40 via-gray-900 to-black flex items-center justify-center">
                <Briefcase className="w-32 h-32 text-blue-400/80" strokeWidth={1.5} />
              </div>
            </motion.div>
          </motion.div>

          {/* Text overlay */}
          <motion.div 
            className="absolute bottom-20 left-0 right-0 text-center z-20 px-6"
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ delay: 0.5 }}
          >
            <motion.div
              className="inline-flex items-center gap-3 mb-4"
              whileHover={{ scale: 1.05 }}
            >
              <div className="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-500/80 to-blue-600/80 flex items-center justify-center shadow-xl border-2 border-blue-300/30">
                <Briefcase className="w-7 h-7 text-white" />
              </div>
            </motion.div>
            <h2 className="text-4xl font-black text-white mb-2 drop-shadow-lg">
              DEVELOPER
            </h2>
            <p className="text-lg text-blue-200/90 font-semibold mb-4">Professional Localization</p>
            <div className="inline-flex items-center gap-2 text-blue-300 font-bold text-base group-hover:gap-4 transition-all">
              <span>ENTER</span>
              <ArrowRight className="w-5 h-5 group-hover:translate-x-2 transition-transform" />
            </div>
          </motion.div>

          {/* Hover effect */}
          <motion.div
            className="absolute inset-0 bg-blue-500/0 group-hover:bg-blue-500/5 transition-colors duration-500 pointer-events-none"
          />
        </Link>

        {/* PLAYER SIDE - RIGHT - Slides in from right */}
        <Link to="/players" className="group flex-1 h-full relative overflow-hidden">
          {/* Diagonal angle overlay - mirrored */}
          <motion.div
            className="absolute inset-0 z-20 pointer-events-none"
            initial={{ x: '100%' }}
            animate={{ x: 0 }}
            transition={{ duration: 0.8, ease: "easeOut" }}
          >
            <div 
              className="absolute inset-0 bg-gradient-to-bl from-orange-600/15 via-transparent to-transparent"
              style={{
                clipPath: 'polygon(40% 0, 100% 0, 100% 100%, 60% 100%)',
              }}
            />
            <motion.div 
              className="absolute inset-0 bg-gradient-to-bl from-orange-500/25 to-transparent border-l-2 border-orange-400/50"
              style={{
                clipPath: 'polygon(45% 0, 100% 0, 100% 100%, 65% 100%)',
              }}
              animate={{
                opacity: [0.4, 0.7, 0.4],
              }}
              transition={{
                duration: 3,
                repeat: Infinity,
                delay: 0.5,
              }}
            />
          </motion.div>

          {/* Background - subtle gradient */}
          <div className="absolute inset-0 bg-gradient-to-bl from-gray-900 via-black to-black" />
          
          {/* Subtle pixel-like dots pattern */}
          <div className="absolute inset-0 opacity-10">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <pattern id="dots-player" width="20" height="20" patternUnits="userSpaceOnUse">
                  <circle cx="2" cy="2" r="1" fill="currentColor" className="text-orange-400"/>
                </pattern>
              </defs>
              <rect width="100%" height="100%" fill="url(#dots-player)"/>
            </svg>
          </div>

          {/* Character spotlight */}
          <motion.div 
            className="absolute inset-0 flex items-center justify-center"
            initial={{ opacity: 0, x: 100 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.8, delay: 0.2 }}
          >
            {/* Subtle spotlight */}
            <div className="absolute w-[500px] h-[500px] rounded-full bg-gradient-radial from-orange-500/15 via-orange-500/5 to-transparent" />
            
            {/* Abstract Icon Design */}
            <motion.div 
              className="relative"
              whileHover={{ scale: 1.05 }}
              transition={{ duration: 0.3 }}
            >
              {/* Outer glow ring */}
              <motion.div 
                className="absolute -inset-6 rounded-full bg-gradient-to-br from-orange-500/20 to-orange-600/20 blur-xl"
                animate={{
                  scale: [1, 1.1, 1],
                  opacity: [0.3, 0.5, 0.3]
                }}
                transition={{ duration: 4, repeat: Infinity, delay: 0.5 }}
              />
              
              {/* Icon Circle */}
              <div className="relative w-72 h-72 rounded-full overflow-hidden border-4 border-orange-400/60 shadow-2xl shadow-orange-500/20 bg-gradient-to-br from-orange-900/40 via-gray-900 to-black flex items-center justify-center">
                <Users className="w-32 h-32 text-orange-400/80" strokeWidth={1.5} />
              </div>
            </motion.div>
          </motion.div>

          {/* Text overlay */}
          <motion.div 
            className="absolute bottom-20 left-0 right-0 text-center z-20 px-6"
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ delay: 0.5 }}
          >
            <motion.div
              className="inline-flex items-center gap-3 mb-4"
              whileHover={{ scale: 1.05 }}
            >
              <div className="w-14 h-14 rounded-xl bg-gradient-to-br from-orange-500/80 to-orange-600/80 flex items-center justify-center shadow-xl border-2 border-orange-300/30">
                <Users className="w-7 h-7 text-white" />
              </div>
            </motion.div>
            <h2 className="text-4xl font-black text-white mb-2 drop-shadow-lg">
              PLAYER
            </h2>
            <p className="text-lg text-orange-200/90 font-semibold mb-4">Voice & Community</p>
            <div className="inline-flex items-center gap-2 text-orange-300 font-bold text-base group-hover:gap-4 transition-all">
              <span>ENTER</span>
              <ArrowRight className="w-5 h-5 group-hover:translate-x-2 transition-transform" />
            </div>
          </motion.div>

          {/* Hover effect */}
          <motion.div
            className="absolute inset-0 bg-orange-500/0 group-hover:bg-orange-500/5 transition-colors duration-500 pointer-events-none"
          />
        </Link>

        {/* Top banner with title */}
        <motion.div
          className="absolute top-24 left-1/2 -translate-x-1/2 z-30 text-center"
          initial={{ opacity: 0, y: -50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.6 }}
        >
          <h1 className="text-6xl md:text-7xl font-black text-white mb-2 tracking-tight drop-shadow-2xl">
            GAMER MINDS
          </h1>
          <motion.p 
            className="text-xl font-bold text-gray-300"
            animate={{ opacity: [0.6, 1, 0.6] }}
            transition={{ duration: 3, repeat: Infinity }}
          >
            CHOOSE YOUR PATH
          </motion.p>
        </motion.div>

        {/* Bottom "Not sure" button */}
        <motion.div
          className="absolute bottom-8 left-1/2 -translate-x-1/2 z-30"
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 1 }}
        >
          <motion.button 
            onClick={() => setShowExplainer(!showExplainer)}
            className="text-white/70 hover:text-white transition-colors font-bold text-base inline-flex items-center gap-2 group px-6 py-3 rounded-full bg-white/5 backdrop-blur-sm border border-white/10 hover:bg-white/10"
            whileHover={{ scale: 1.05 }}
            whileTap={{ scale: 0.95 }}
          >
            <span>Not sure? Learn more</span>
            <motion.span
              animate={{ rotate: showExplainer ? 180 : 0 }}
              transition={{ duration: 0.3 }}
            >
              <ChevronDown className="w-5 h-5" />
            </motion.span>
          </motion.button>
        </motion.div>
      </main>
      
      {/* Modal Explainer */}
      <AnimatePresence>
        {showExplainer && (
          <>
            <motion.div
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              exit={{ opacity: 0 }}
              transition={{ duration: 0.3 }}
              className="fixed inset-0 bg-black/90 backdrop-blur-sm z-40"
              onClick={() => setShowExplainer(false)}
            />
            
            <motion.div
              initial={{ opacity: 0, scale: 0.9, y: 20 }}
              animate={{ opacity: 1, scale: 1, y: 0 }}
              exit={{ opacity: 0, scale: 0.9, y: 20 }}
              transition={{ duration: 0.3, ease: "easeOut" }}
              className="fixed inset-0 z-50 flex items-center justify-center p-4 md:p-6 pointer-events-none"
            >
              <div className="w-full max-w-4xl max-h-[90vh] overflow-y-auto pointer-events-auto">
                <div className="bg-gradient-to-br from-gray-900/95 to-gray-950/95 backdrop-blur-xl border-2 border-gray-700/50 rounded-3xl p-8 md:p-12 shadow-2xl relative">
                  <button
                    onClick={() => setShowExplainer(false)}
                    className="absolute top-4 right-4 w-10 h-10 rounded-full bg-gray-800/50 hover:bg-gray-700/80 border border-gray-600/30 flex items-center justify-center text-gray-300 hover:text-white transition-all"
                  >
                    <X className="w-5 h-5" />
                  </button>
                  
                  <h2 className="text-3xl md:text-4xl font-black mb-6 text-center text-white">
                    Two Sides of the Same Mission
                  </h2>
                  <p className="text-lg text-gray-300 mb-8 text-center leading-relaxed">
                    Gamer Minds connects studios with professional localization services while giving players a voice in what gets translated.
                  </p>
                  
                  <div className="grid md:grid-cols-2 gap-6">
                    <div className="bg-blue-900/20 border border-blue-700/30 rounded-2xl p-6 hover:border-blue-600/50 transition-all">
                      <h3 className="text-xl font-bold text-white mb-3">For Studios & Publishers</h3>
                      <p className="text-gray-300 mb-4">
                        Professional translation, editing, and LQA services with production-ready workflows.
                      </p>
                      <Link
                        to="/developers"
                        className="inline-flex items-center gap-2 text-blue-400 hover:text-blue-300 font-semibold transition-colors"
                        onClick={() => setShowExplainer(false)}
                      >
                        Explore Services
                        <ArrowRight className="w-4 h-4" />
                      </Link>
                    </div>
                    
                    <div className="bg-orange-900/20 border border-orange-700/30 rounded-2xl p-6 hover:border-orange-600/50 transition-all">
                      <h3 className="text-xl font-bold text-white mb-3">For Players</h3>
                      <p className="text-gray-300 mb-4">
                        Vote for the games and languages you want to see localized.
                      </p>
                      <Link
                        to="/players"
                        className="inline-flex items-center gap-2 text-orange-400 hover:text-orange-300 font-semibold transition-colors"
                        onClick={() => setShowExplainer(false)}
                      >
                        Join Community
                        <ArrowRight className="w-4 h-4" />
                      </Link>
                    </div>
                  </div>
                </div>
              </div>
            </motion.div>
          </>
        )}
      </AnimatePresence>
    </div>
  );
}