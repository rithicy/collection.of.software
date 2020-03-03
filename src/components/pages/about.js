import React from "react";

function about() {
  const detail = "hello everyone";
  return (
    <div>
      <h3 style={{ color:'red' }}>About Page</h3>
      <p>{detail}</p>
    </div>
  );
}

export default about;
