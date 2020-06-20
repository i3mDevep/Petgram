import React from 'react'

import { gql } from 'apollo-boost'
import { Mutation } from 'react-apollo'

const LOGIN_USER = gql`
mutation LOGIN_USER ($email:String!,$password:String!){
    loginUser(email:$email,password:$password){
      token
    }
}
`
export const LoginUserMutation = ({children}) => (
    <Mutation mutation={LOGIN_USER}>
        { children }
    </Mutation>
)