import React from "react";
import "./App.css";

import Home from "./components/pages/home";
import Layout from "./components/layouts/layout";
import BUrgerBuilder from "./container/BurgerBUilder/BurgerBuilder";
import Burger from "./components/Burger/Burger";

// root component

function App() {
  return (
    <Layout>
      <Home />
      <BUrgerBuilder />
      <Burger />
    </Layout>
  );
}

export default App;
