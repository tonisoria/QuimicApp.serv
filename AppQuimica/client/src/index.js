import App from "./App";
import React from "react";
import ReactDOM from "react-dom";
import reportWebVitals from "./reportWebVitals";
import "../node_modules/bootstrap/dist/css/bootstrap.css";
import "../node_modules/bootstrap/dist/js/bootstrap.bundle.js";
import axios from "axios";

axios.defaults.baseURL = 'http://localhost/M7_M14/projecte_M14/quimica/AppQuimica/server/public/api/auth/';
// axios.defaults.baseURL = "http://localhost/Clase/ProyectoFinal/Quimica/quimica/AppQuimica/server/public/api/auth/";
axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("token");

ReactDOM.render(
  <React.StrictMode>
    <App />
  </React.StrictMode>,
  document.getElementById("root")
);

// If you want to start measuring performance in your app, pass a function - react router dom
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
