import { createBrowserRouter } from "react-router";
import { Landing } from "./pages/Landing";
import { Developers } from "./pages/Developers";
import { Players } from "./pages/Players";
import { Privacy } from "./pages/Privacy";
import { Legal } from "./pages/Legal";

export const router = createBrowserRouter([
  {
    path: "/",
    Component: Landing,
  },
  {
    path: "/developers",
    Component: Developers,
  },
  {
    path: "/players",
    Component: Players,
  },
  {
    path: "/privacy",
    Component: Privacy,
  },
  {
    path: "/legal",
    Component: Legal,
  },
]);