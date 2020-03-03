import React from "react";
import PropTypes from "prop-types";
const burgerIngredient = props => {
  let ingredient = null;
  switch (props.type) {
    case "bread-bottom":
      ingredient = <div className="card">Bread bottom</div>;
      break;
    case "bread-top":
      ingredient = (
        <div className="card bg-dark">
          <div>Bread Top</div>
        </div>
      );
      break;
    default:
      ingredient = null;
  }
  return ingredient;
};

// validation using proptype
burgerIngredient.PropTypes = {
  type: PropTypes.string.isRequired
};

export default burgerIngredient;
