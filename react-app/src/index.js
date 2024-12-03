import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import App from "./App";
import { dataProvider } from "./context/dataContext";

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <React.StrictMode>
    <dataProvider>
      <App />
    </dataProvider>
  </React.StrictMode>
);
