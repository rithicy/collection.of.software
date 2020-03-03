import React from "react";
import burgerIngredient from "./BurgerIngredient/BUrgerIngredient";

const burger = (props) => {
  return (
    <div className="jumborton">
      <burgerIngredient type="bread-top" />

      <burgerIngredient type="bread-bottom" />
    </div>
  );
};

export default burger;
