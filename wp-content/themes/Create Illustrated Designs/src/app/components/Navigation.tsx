import { Link, useLocation } from 'react-router';
import { motion } from 'motion/react';
import { Logo } from './Logo';

export function Navigation() {
  const location = useLocation();
  
  return (
    <motion.header 
      initial={{ y: -100 }}
      animate={{ y: 0 }}
      className="sticky top-0 z-50 backdrop-blur-lg bg-black/50 border-b border-purple-500/20"
    >
      <nav className="container mx-auto px-6 py-4">
        <div className="flex items-center justify-between">
          <Link to="/" className="group">
            <Logo className="h-8 w-auto transition-all group-hover:drop-shadow-[0_0_10px_rgba(168,85,247,0.5)]" />
          </Link>
          
          <div className="flex items-center gap-2 bg-purple-950/30 rounded-full p-1 border border-purple-500/30">
            <Link
              to="/developers"
              className={`px-6 py-2 rounded-full transition-all ${
                location.pathname === '/developers'
                  ? 'bg-purple-600 text-white shadow-lg shadow-purple-500/50'
                  : 'text-purple-300 hover:text-white hover:bg-purple-900/50'
              }`}
            >
              Developers
            </Link>
            <Link
              to="/players"
              className={`px-6 py-2 rounded-full transition-all ${
                location.pathname === '/players'
                  ? 'bg-pink-600 text-white shadow-lg shadow-pink-500/50'
                  : 'text-purple-300 hover:text-white hover:bg-purple-900/50'
              }`}
            >
              Players
            </Link>
          </div>
        </div>
      </nav>
    </motion.header>
  );
}