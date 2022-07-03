import React from "react";
import { Routes as ReactRouterRoutes, Route } from "react-router-dom";
import { HomePage } from "../pages/home.page";
import { LoginPage } from "../pages/login-page";
import { SignUpPage } from "../pages/sign-up";
import { ProtectedRoute } from "./protect-route.component";

const Routes: React.FC = () => {
  return (
    <ReactRouterRoutes>
      <Route
        path="/"
        element={
          <ProtectedRoute>
            <HomePage />
          </ProtectedRoute>
        }
      />

      <Route path="login" element={<LoginPage />} />
      <Route path="signup" element={<SignUpPage />} />
    </ReactRouterRoutes>
  );
};

export { Routes };
