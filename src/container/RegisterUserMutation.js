import React from "react";

import { gql } from "apollo-boost";
import { Mutation } from "react-apollo";

const REGITER_USER = gql`
  mutation REGITER_USER(
    $name: String!
    $email: String!
    $cellphone: String!
    $phone: String
    $address: String!
    $password: String!
  ) {
    addRegisterUser(
      name: $name
      email: $email
      cellphone: $cellphone
      phone: $phone
      address: $address
      password: $password
    ) {
      token
    }
  }
`;
export const RegisterUserMutation = ({ children }) => {
  return <Mutation mutation={REGITER_USER}>{children}</Mutation>;
};
