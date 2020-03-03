import React from "react";
import "./App.css";

import Home from "./components/pages/home";
import Layout from "./components/layouts/layout";

// root component

function App() {
  return (
    <Layout>
      <Home />
    </Layout>
  );
}

export default App;
