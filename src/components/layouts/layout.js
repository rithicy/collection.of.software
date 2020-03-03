/* eslint-disable jsx-a11y/anchor-is-valid */
import React from "react";
import logo from "../../logo.svg";
import rail from "../../rail.svg";
import Aux from "../../hoc/auxComponent";

const layout = props => (
  <Aux>
    <div>
      <nav class="navbar navbar-light bg-dark text-white">
        <div className="container">
          <a class="navbar-brand text-white" href="#">
            <img
              src={rail}
              width="50"
              height="50"
              className="d-inline-block align-top"
              alt=""
            />
            <img
              src={logo}
              width="20"
              height="20"
              className="App-logo-nav d-inline-block align-top"
              alt=""
            />
            React Rails
          </a>
        </div>
      </nav>

      {/* content or page */}
      <div className="container">{props.children}</div>
      <footer className="text-center">
        <p>Copyright</p>
      </footer>
    </div>
  </Aux>
);

export default layout;
