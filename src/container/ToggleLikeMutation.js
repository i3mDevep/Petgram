import React from 'react'
import { gql } from 'apollo-boost'
import { Mutation } from 'react-apollo'

const LIKE_PHOTO = gql`
mutation LIKE_PHOTO($id: Int!){
  likePhoto(id: $id){
    id,
    liked,
    likes,
    src,
    categoryid
  }
}
`
export const ToggleLikeMutation = ({ children }) => {
   return <Mutation mutation = { LIKE_PHOTO }>
       { children }
   </Mutation>
}