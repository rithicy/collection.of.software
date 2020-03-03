import React from "react";
import BurgerIngredient from "./BurgerIngredient/BUrgerIngredient";

const burger = props => {
  return (
    <div className="jumborton">
      <BurgerIngredient type="bread-top" />
      <BurgerIngredient type="bread-bottom" />
    </div>
  );
};

export default burger;
