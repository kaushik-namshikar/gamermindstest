import { Link } from 'react-router';
import { Mail, Twitter, Linkedin } from 'lucide-react';
import { Logo } from './Logo';

export function Footer() {
  return (
    <footer className="relative bg-gradient-to-b from-transparent to-black border-t border-purple-500/20">
      <div className="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcz48cGF0dGVybiBpZD0iZ3JpZCIgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIj48cGF0aCBkPSJNIDQwIDAgTCAwIDAgMCA0MCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJyZ2JhKDEzOSw5MiwyNDYsMC4xKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-20" />
      
      <div className="container mx-auto px-6 py-12 relative">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
          <div>
            <Link to="/" className="inline-block mb-4 group">
              <Logo className="h-6 w-auto transition-all group-hover:drop-shadow-[0_0_10px_rgba(168,85,247,0.5)]" />
            </Link>
            <p className="text-sm text-purple-300/70">
              Game Localization Collective
            </p>
          </div>
          
          <div>
            <h3 className="font-semibold text-purple-200 mb-3">For Studios</h3>
            <ul className="space-y-2 text-sm text-purple-300/70">
              <li><Link to="/developers" className="hover:text-purple-300 transition-colors">Services</Link></li>
              <li><Link to="/developers#quote" className="hover:text-purple-300 transition-colors">Request Quote</Link></li>
              <li><Link to="/developers#languages" className="hover:text-purple-300 transition-colors">Languages</Link></li>
            </ul>
          </div>
          
          <div>
            <h3 className="font-semibold text-purple-200 mb-3">For Players</h3>
            <ul className="space-y-2 text-sm text-purple-300/70">
              <li><Link to="/players" className="hover:text-purple-300 transition-colors">How it Works</Link></li>
              <li><Link to="/players#faq" className="hover:text-purple-300 transition-colors">FAQ</Link></li>
              <li><a href="#" className="hover:text-purple-300 transition-colors">Join Discord</a></li>
            </ul>
          </div>
          
          <div>
            <h3 className="font-semibold text-purple-200 mb-3">Connect</h3>
            <div className="flex gap-3">
              <a href="#" className="w-9 h-9 rounded-lg bg-purple-900/30 border border-purple-500/30 flex items-center justify-center hover:bg-purple-800/50 hover:border-purple-400/50 transition-all group">
                <Mail className="w-4 h-4 text-purple-400 group-hover:scale-110 transition-transform" />
              </a>
              <a href="#" className="w-9 h-9 rounded-lg bg-purple-900/30 border border-purple-500/30 flex items-center justify-center hover:bg-purple-800/50 hover:border-purple-400/50 transition-all group">
                <Twitter className="w-4 h-4 text-purple-400 group-hover:scale-110 transition-transform" />
              </a>
              <a href="#" className="w-9 h-9 rounded-lg bg-purple-900/30 border border-purple-500/30 flex items-center justify-center hover:bg-purple-800/50 hover:border-purple-400/50 transition-all group">
                <Linkedin className="w-4 h-4 text-purple-400 group-hover:scale-110 transition-transform" />
              </a>
            </div>
          </div>
        </div>
        
        <div className="pt-8 border-t border-purple-500/20 text-center text-sm text-purple-300/50">
          <p>© 2026 Gamer Minds. All rights reserved.</p>
          <div className="mt-2 flex justify-center gap-4">
            <Link to="/privacy" className="hover:text-purple-300 transition-colors">Privacy Policy</Link>
            <span>•</span>
            <Link to="/legal" className="hover:text-purple-300 transition-colors">Terms & Legal</Link>
          </div>
        </div>
      </div>
    </footer>
  );
}